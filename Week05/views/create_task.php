<?php

/** @var $model \thecodeholic\phpmvc\Model */

use thecodeholic\phpmvc\form\Form;

$form = new Form();
?>

<h1>Create Task</h1>

<?php $form = Form::begin('', 'post') ?>
<?php echo $form->field($model, 'title') ?>
<?php echo $form->field($model, 'description') ?>
<button class="btn btn-success">Create</button>
<?php Form::end() ?>