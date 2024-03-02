<?php include_once 'includes/header.php'?>


<div class="card home">
    <?php if (isset($_SESSION['userId'])): ?>
        <h1>Привет, <?=$user['name']?>!</h1>
        <a href="/?act=logout" role="button">Выйти из аккаунта</a>
    <?php  else: ?>
        <h1>Вы не авторизованны!</h1>
        <a href="/?act=login" role="button">Войти</a>
    <?php endif; ?>
</div>

<?php include_once 'includes/footer.php'?>

