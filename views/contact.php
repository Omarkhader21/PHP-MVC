<?php

/** @var $this \omarkhader\phpmvccore\View */
/** @var $model \app\models\ContactForm */

use omarkhader\phpmvccore\form\Form;
use \omarkhader\phpmvccore\form\TextareaField;

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