<?php
declare(strict_types=1);
header('Content-Type: application/json; charset=utf-8');
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Content-Type');
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') exit;
session_start();
$host='localhost'; $db='soulmate'; $user='root'; $pass='';
try { $pdo=new PDO("mysql:host=$host;dbname=$db;charset=utf8mb4",$user,$pass,[PDO::ATTR_ERRMODE=>PDO::ERRMODE_EXCEPTION]); }
catch(PDOException $e){ http_response_code(500); echo json_encode(['success'=>false,'message'=>'Database connection failed.']); exit; }
function input(): array { $data=json_decode(file_get_contents('php://input'),true); return is_array($data)?$data:$_POST; }
function respond(array $data,int $status=200): never { http_response_code($status); echo json_encode($data); exit; }
function requireLogin(): int { if(empty($_SESSION['user_id'])) respond(['success'=>false,'message'=>'Unauthorized'],401); return (int)$_SESSION['user_id']; }
