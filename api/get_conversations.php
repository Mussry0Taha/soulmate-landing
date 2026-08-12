<?php require 'config.php';$me=requireLogin();
$sql='SELECT u.id,u.name,u.avatar, (SELECT body FROM messages WHERE (sender_id=u.id AND receiver_id=?) OR (sender_id=? AND receiver_id=u.id) ORDER BY created_at DESC LIMIT 1) AS last_message FROM users u WHERE u.id IN (SELECT CASE WHEN sender_id=? THEN receiver_id ELSE sender_id END FROM messages WHERE sender_id=? OR receiver_id=?) ORDER BY u.name';
$s=$pdo->prepare($sql);$s->execute([$me,$me,$me,$me,$me]);respond(['success'=>true,'conversations'=>$s->fetchAll(PDO::FETCH_ASSOC)]);
