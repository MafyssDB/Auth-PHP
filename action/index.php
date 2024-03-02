<?php
/**
 * @var $pdo
 */

if (isset($_SESSION['userId'])) {
    $sql = "SELECT * FROM users WHERE id = :id";
    $stmt = $pdo->prepare("$sql");
    $stmt->execute([
        'id' => $_SESSION['userId']
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
}

require_once 'templates/index.php';
