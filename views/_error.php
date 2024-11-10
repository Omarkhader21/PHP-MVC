<?php

/** @var $exception \Exception  */
/** @var $this \app\core\View */

$this->title = "error";
?>

<h2 class="mt-5">
    <?php echo $exception->getCode() ?> - <?php echo $exception->getMessage() ?>
</h2>