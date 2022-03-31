<h1>Registration page</h1>

<form action="" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text"
               class="form-control<?php echo $model->hasError('name') ? ' is-invalid' : '' ?>"
               id="name" name="name" aria-describedby="nameHelp">
        <?php if ($model->getFirstError('name')) : ?>
            <div class="invalid-feedback">
                <?= $model->getFirstError('name') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text"
               class="form-control<?php echo $model->hasError('email') ? ' is-invalid' : '' ?>"
               id="email" name="email" aria-describedby="emailHelp">
        <?php if ($model->getFirstError('email')) : ?>
            <div class="invalid-feedback">
                <?= $model->getFirstError('email') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               class="form-control<?php echo $model->hasError('password') ? ' is-invalid' : '' ?>"
               id="password" name="password" aria-describedby="passwordHelp">
        <?php if ($model->getFirstError('password')) : ?>
            <div class="invalid-feedback">
                <?= $model->getFirstError('password') ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="confirm" class="form-label">Confirm password</label>
        <input type="password"
               class="form-control<?php echo $model->hasError('confirm') ? ' is-invalid' : '' ?>"
               id="confirm" name="confirm" aria-describedby="confirmHelp">
        <?php if ($model->getFirstError('confirm')) : ?>
            <div class="invalid-feedback">
                <?= $model->getFirstError('confirm') ?>
            </div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>