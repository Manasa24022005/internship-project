<?php
include 'db.php';

$token = $_POST['token'];

$redis = new Redis();
$redis->connect('127.0.0.1', 6379);

$user_id = $redis->get($token);

$stmt = $conn->prepare("UPDATE users SET age=?, dob=?, contact=? WHERE id=?");
$stmt->bind_param("issi", $_POST['age'], $_POST['dob'], $_POST['contact'], $user_id);

$stmt->execute();

echo "Updated";
?>