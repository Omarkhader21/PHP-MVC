<?php

/** @var $model \app\models\User; */

use app\core\form\Form;
$this->title = "login";
?>

<div class="container mt-5">
    <h1>Login Page</h1>

    <?php $form = app\core\form\Form::begin('', 'post') ?>

    <?php echo $form->field($model, 'email'); ?>
    <?php echo $form->field($model, 'password')->passwordField(); ?>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    <?php Form::end() ?>
</div>