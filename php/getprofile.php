<?php
include 'db.php';

$token = $_POST['token'];

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$user_id = $redis->get($token);

$stmt = $conn->prepare("SELECT age, dob, contact FROM users WHERE id=?");
$stmt->bind_param("i", $user_id);
$stmt->execute();

$result = $stmt->get_result();

echo json_encode($result->fetch_assoc());
?>