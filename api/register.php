<?php
require_once 'config.php';

$data = json_decode(file_get_contents('php://input'), true);

// Validate required fields
$required = ['name', 'email', 'password', 'dob', 'gender', 'preference'];
foreach ($required as $field) {
    if (empty($data[$field])) {
        echo json_encode(['success' => false, 'message' => "Missing field: $field"]);
        exit();
    }
}

$name = trim($data['name']);
$email = trim($data['email']);
$password = password_hash($data['password'], PASSWORD_DEFAULT);
$dob = $data['dob'];
$gender = $data['gender'];
$preference = $data['preference'];
$bio = trim($data['bio'] ?? '');
$location = trim($data['location'] ?? '');

try {
    // Check if email already exists
    $check = $pdo->prepare("SELECT id FROM users WHERE email = ?");
    $check->execute([$email]);
    if ($check->fetch()) {
        echo json_encode(['success' => false, 'message' => 'Email already registered']);
        exit();
    }

    // Insert new user
    $sql = "INSERT INTO users (name, email, password, dob, gender, preference, bio, location) 
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([$name, $email, $password, $dob, $gender, $preference, $bio, $location]);

    // Auto-login the user
    $_SESSION['user_id'] = $pdo->lastInsertId();

    echo json_encode(['success' => true, 'message' => 'Account created successfully']);

} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Registration failed: ' . $e->getMessage()]);
}
?>