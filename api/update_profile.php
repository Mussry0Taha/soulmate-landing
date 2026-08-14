<?php
require_once 'config.php';

if (!isset($_SESSION['user_id'])) {
    echo json_encode(['success' => false, 'message' => 'Not logged in']);
    exit();
}

$data = json_decode(file_get_contents('php://input'), true);

$updates = [];
$params = [];

if (!empty($data['name'])) {
    $updates[] = "name = ?";
    $params[] = trim($data['name']);
}
if (!empty($data['bio'])) {
    $updates[] = "bio = ?";
    $params[] = trim($data['bio']);
}
if (!empty($data['location'])) {
    $updates[] = "location = ?";
    $params[] = trim($data['location']);
}
if (!empty($data['gender'])) {
    $updates[] = "gender = ?";
    $params[] = $data['gender'];
}
if (!empty($data['preference'])) {
    $updates[] = "preference = ?";
    $params[] = $data['preference'];
}

if (empty($updates)) {
    echo json_encode(['success' => false, 'message' => 'No fields to update']);
    exit();
}

$params[] = $_SESSION['user_id'];
$sql = "UPDATE users SET " . implode(", ", $updates) . " WHERE id = ?";

try {
    $stmt = $pdo->prepare($sql);
    $stmt->execute($params);
    echo json_encode(['success' => true, 'message' => 'Profile updated successfully']);
} catch(PDOException $e) {
    echo json_encode(['success' => false, 'message' => 'Update failed: ' . $e->getMessage()]);
}
?>