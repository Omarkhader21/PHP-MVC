<?php

/** @var $this \app\core\View */
/** @var $model \app\models\ContactForm */

use app\core\form\Form;
use \app\core\form\TextareaField;

$this->title = "contact";
?>
<div class="container mt-5">
    <?php $form = Form::begin('/contact', 'post'); ?>
    <div class="mb-3">
        <?php echo $form->field($model, 'subject'); ?>
    </div>
    <div class="mb-3">
        <?php echo $form->field($model, 'email'); ?>
    </div>
    <div class="mb-3">
        <?php echo new TextareaField($model, 'message'); ?>
    </div>

    <button type="submit" class="btn btn-primary mt-3">Submit</button>
    <?php Form::end() ?>
</div>