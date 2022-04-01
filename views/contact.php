<?php

use App\Core\Forms\Form;
use App\Core\View;
use App\Models\ContactForm;

/** @var $model ContactForm */
/** @var $this View */

$this->title = 'Contact';
?>
<h1>Contact page</h1>

<?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->field($model, 'subject'); ?>
    <?php echo $form->field($model, 'email')->emailField(); ?>
    <?php echo $form->field($model, 'body')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end(); ?>