<?php
use app\core\Application;
$this->title = "home";
?>

<div class="container mt-5">
    <h1>Home page</h1>

    <h3>
        <?php if (Application::isGuest()) : ?>
            <h2>Try to login, if you have an account or if you don't just create new one</h2>
        <?php else : ?>
            <h1>Welcome <?php echo Application::$app->user->getDisplayName(); ?></h1>
        <?php endif; ?>
    </h3>
</div>