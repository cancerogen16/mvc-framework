<?php

use App\core\Forms\Form;
use App\models\LoginForm;

/** @var $model LoginForm */
?>
<h1>Login page</h1>

<?php $form = Form::begin('', 'post'); ?>
<?php echo $form->field($model, 'email')->emailField(); ?>
<?php echo $form->field($model, 'password')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end(); ?>