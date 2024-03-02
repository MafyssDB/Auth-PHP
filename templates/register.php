<?php include_once 'includes/header.php'?>

<form action="/?act=register" method="POST" class="card">
    <h2>Регистрация</h2>
    <?php if(isset($error['passwordError'])): ?>
        <div class="notice error"><?=$error['passwordError']?></div>
    <?php endif ?>
    <label for="name">
        Имя
        <input
            type="text"
            id="name"
            name="name"
            placeholder="Иванов Иван"
            <?php if(isset($_POST['name'])): ?>
               value="<?=$_POST['name']?>"
            <?php endif ?>
        >
        <?php if(isset($error['name'])): ?>
            <small class="danger"><?=$error['name']?></small>
        <?php endif ?>
    </label>

    <label for="email">
        E-mail
        <input
            type="text"
            id="email"
            name="email"
            placeholder="example@example.su"
            <?php if(isset($_POST['email'])): ?>
                value="<?=$_POST['email']?>"
            <?php endif ?>
        >
        <?php if(isset($error['email'])): ?>
            <small class="danger"><?=$error['email']?></small>
        <?php endif ?>
    </label>

    <div class="grid">
        <label for="password">
            Пароль
            <input
                type="password"
                id="password"
                name="password"
                placeholder="******"
            >
            <?php if(isset($error['password'])): ?>
                <small class="danger"><?=$error['password']?></small>
            <?php endif ?>
        </label>

        <label for="password_confirmation">
            Подтверждение
            <input
                type="password"
                id="password_confirmation"
                name="password_confirmation"
                placeholder="******"
            >
            <?php if(isset($error['passwordConfirmation'])): ?>
                <small class="danger"><?=$error['passwordConfirmation']?></small>
            <?php endif ?>
        </label>
    </div>

    <fieldset>
        <label for="terms">
            <input
                type="checkbox"
                id="terms"
                name="terms"
            >
            Я принимаю все условия пользования
        </label>
    </fieldset>

    <button
        type="submit"
        id="submit"
        disabled
    >Продолжить</button>
</form>

<p>У меня уже есть <a href="/?act=login">аккаунт</a></p>

<?php include_once 'includes/footer.php'?>

