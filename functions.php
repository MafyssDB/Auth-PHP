<?php

function clearData(string $data):string
{
    $data = trim($data);
    $data = strip_tags($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;

}

function redirect($path):void
{
    header('Location:' . $path);
    die();
}

function checkEmail($pdo, $email):bool
{
    $sql = "SELECT * FROM users WHERE email = :email";
    $stmt = $pdo->prepare("$sql");
    $stmt->execute(['email' => $email]);
    $emailUsers = $stmt->fetch(PDO::FETCH_ASSOC);
    if (!empty($emailUsers)){
        return true;
    }else{
        return false;
    }
}
