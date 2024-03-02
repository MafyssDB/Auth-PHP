<?php include_once 'includes/header.php'?>

<form action="/?act=login" method="POST" class="card">
    <h2>Вход</h2>
    <?php if(isset($error['authError'])): ?>
        <div class="notice error"><?=$error['authError']?></div>
    <?php endif ?>

    <label for="name">
        Email
        <input
            type="email"
            id="name"
            name="email"
            placeholder="example@example.ru"
        <?php if(isset($_POST['email'])): ?>
            value="<?=$_POST['email']?>"
        <?php endif ?>
        >
        <?php if(isset($error['email'])): ?>
            <small class="danger"><?=$error['email']?></small>
        <?php endif ?>
    </label>

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

    <button
        type="submit"
        id="submit"
    >Продолжить</button>
</form>

<p>У меня еще нет <a href="/?act=register">аккаунта</a></p>

<?php include_once 'includes/footer.php'?>

