<?php

use App\core\Forms\Form;
use App\core\View;
use App\models\ContactForm;

/** @var $model ContactForm */
/** @var $this View */

$this->title = 'Contact';
?>
<h1>Contact page</h1>

<?php $form = Form::begin('', 'post'); ?>
    <?php echo $form->field($model, 'subject'); ?>
    <?php echo $form->field($model, 'email')->emailField(); ?>
    <?php echo $form->textareaField($model, 'body'); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo Form::end(); ?>