<?php
include 'db.php';

$email = $_POST['email'];
$password = $_POST['password'];
$stmt = $conn->prepare("SELECT id, password FROM users WHERE email=?");
$stmt->bind_param("s", $email);
$stmt->execute();
$result = $stmt->get_result();

if ($row = $result->fetch_assoc()) {

    if (password_verify($password, $row['password'])) {

        $token = bin2hex(random_bytes(16));

        // Redis connection
        $redis = new Redis();
        $redis->connect('127.0.0.1', 6379);

        $redis->set($token, $row['id']);

        echo json_encode([
            "status" => "success",
            "token" => $token
        ]);
    } else {
        echo json_encode(["status" => "fail"]);
    }
}
?>