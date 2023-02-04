<?php
include 'main.php';

if (!isset($_SESSION['user'])) {
    http_response_code(401);
    exit();
}

$q = $conn->prepare('INSERT INTO ocarro VALUES (null, :modelo, :ano, :cor, :placa, :user)');
$q->bindValue(':modelo', $_POST['modelo']);
$q->bindValue(':ano', $_POST['ano']);
$q->bindValue(':cor', $_POST['cor']);
$q->bindValue(':placa', $_POST['placa']);
$q->bindValue(':user', $_SESSION['user']['USUARIO_ID']);
$q->execute();
$objId = $conn->lastInsertId();

?>