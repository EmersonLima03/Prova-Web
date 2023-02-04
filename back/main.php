<?php
    header('Access-Control-Allow-Origin: http://localhost:5173');
    header('Access-Control-Allow-Credentials: true');

    $dsn = 'mysql:dbname=carros;host=127.0.0.1;port=3306';
    $conn = new PDO($dsn, 'root', '');

    session_start();  
?>