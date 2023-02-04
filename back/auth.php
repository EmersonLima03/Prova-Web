<?php
require 'main.php';

$email = $_POST['email'];
$senha = $_POST['senha'];

$stmt = $conn->prepare('SELECT * FROM usuario WHERE US_EMAIL = :email AND US_SENHA = :senha');
$stmt->execute([
    'email' => $email, 
    'senha' => $senha
]);

$data = $stmt->fetchAll(PDO::FETCH_ASSOC);

if (sizeof($data) == 0) {
    http_response_code(401);
    exit();
}

$user = $data[0];
$_SESSION['user'] = $user;
http_response_code(200);
?>