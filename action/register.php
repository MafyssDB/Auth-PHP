<?php
/**
 * @var $pdo
 */
$error = [];


if (!empty($_POST)){
    $name = clearData($_POST['name']);
    $email = clearData($_POST['email']);
    $password = clearData($_POST['password']);
    $passwordConfirmation = clearData($_POST['password_confirmation']);

    if (empty($name)){
        $error['name'] = 'Поле обязательно для заполнения';
    }

    if (empty($email)){
        $error['email'] = 'Поле обязательно для заполнения';
    }elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)){
        $error['email'] = 'Неверный формат Email';
    }elseif (checkEmail($pdo, $email)){
        $error['email'] = 'Пользователь с таким Email уже есть';
    }

    if (empty($password)){
        $error['password'] = 'Поле обязательно для заполнения';
    }elseif (mb_strlen($password) <= 7 || mb_strlen($password) >= 17){
        $error['password'] = 'Длина пароля должна быть от 8 до 16 символов';
    }
    if (empty($passwordConfirmation)){
        $error['passwordConfirmation'] = 'Поле обязательно для заполнения';
    }
    if ($password !== $passwordConfirmation){
        $error['passwordError'] = 'Пароли не совпадают';
    }
    if (empty($error)){
        $password = password_hash($password, PASSWORD_DEFAULT);
        $sql = "INSERT INTO users (name , email, password) VALUE (:name, :email, :password)";
        $stmt = $pdo->prepare($sql);
        $stmt->execute([
            'name' => $name,
            'email' => $email,
            'password' => $password,
        ]);
        redirect('/?act=login');
    }

}

require_once 'templates/register.php';
