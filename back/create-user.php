<?php
require 'main.php';

$q = $conn->prepare('INSERT INTO usuario VALUES (null, :nome, :email, :senha)');
$q->bindValue(':nome', $_POST['nome']);
$q->bindValue(':email', $_POST['email']);
$q->bindValue(':senha', $_POST['senha']);
$q->execute();
$userId = $conn->lastInsertId();

http_response_code(201);
?>