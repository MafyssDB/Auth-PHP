<?php
/**
 * @var $pdo
 */

$error = [];

if (!empty($_POST)) {
    $email = clearData($_POST['email']);
    $password = clearData($_POST['password']);

    if (empty($email)){
        $error['email'] = 'Поле обязательно для заполнения';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Неверный формат Email';
    }

    if (empty($password)){
        $error['password'] = 'Поле обязательно для заполнения';
    }

    if (empty($error)) {
        $sql = "SELECT * FROM users WHERE email = :email";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'email' => $email,
        ]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        if (empty($user)){
            $error['authError'] = 'Пользователь не найден';
        }elseif (password_verify($password, $user['password'])){
            $_SESSION['userId'] = $user['id'];
            redirect('/');
        }else{
            $error['authError'] = 'Неверный пароль';
        }
    }

}

require_once 'templates/login.php';
