<?php

use erast\phpmvc\Forms\Form;
use App\models\User;

/** @var $model User */
?>
<h1>Registration page</h1>

<?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->field($model, 'name'); ?>
    <?php echo $form->field($model, 'email')->emailField(); ?>
    <?php echo $form->field($model, 'password')->passwordField(); ?>
    <?php echo $form->field($model, 'confirm')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end(); ?>
