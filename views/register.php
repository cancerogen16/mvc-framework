<h1>Registration page</h1>

<?php $form = \App\Core\Form::begin('', 'post'); ?>
    <?php echo $form->field($model, 'name'); ?>
    <?php echo $form->field($model, 'email')->emailField(); ?>
    <?php echo $form->field($model, 'password')->passwordField(); ?>
    <?php echo $form->field($model, 'confirm')->passwordField(); ?>
    <button type="submit" class="btn btn-primary">Submit</button>
<?php echo \App\Core\Form::end(); ?>
