<?php
$dbHost = 'localhost';
$dbName = 'auth';
$dbUsername = 'root';
$dbPassword = '';

try {
    $pdo = new PDO("mysql:host=$dbHost;dbname=$dbName;", $dbUsername, $dbPassword);
}catch(PDOException $exception){
    echo "ERROR: {$exception->getMessage()}";
}
