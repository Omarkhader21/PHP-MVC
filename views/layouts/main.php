<?php

use omarkhader\phpmvccore\Application;
?>
<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?php echo $this->title; ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
    <nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
        <div class="container-fluid">
            <a class="navbar-brand" href="/home">PHP MVC</a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/home' ?  'active' : '' ?>" aria-current="page" href="/home">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/contact' ?  'active' : '' ?>" aria-current="page" href="/contact">Contact</a>
                    </li>
                </ul>
                <?php if (Application::isGuest()) : ?>
                    <ul class="navbar-nav me-left mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/login' ?  'active' : '' ?>" aria-current="page" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/register' ?  'active' : '' ?>" aria-current="page" href="/register">Register</a>
                        </li>
                    </ul>
                <?php else: ?>
                    <ul class="navbar-nav me-left mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link <?php echo $_SERVER['REQUEST_URI'] === '/profile' ?  'active' : '' ?>" aria-current="page" href="/profile">profile</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" aria-current="page" href="/logout">Welcome <?php echo Application::$app->user->getDisplayName(); ?> (Logout)</a>
                        </li>
                    </ul>
                <?php endif; ?>
            </div>
        </div>
    </nav>

    <div class="container">
        <?php if (Application::$app->session->getFlashMessage('success')): ?>
            <div class="alert alert-success">
                <?php echo Application::$app->session->getFlashMessage('success'); ?>
            </div>
        <?php endif; ?>

        {{ content }}
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>

</html>