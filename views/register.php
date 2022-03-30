<h1>Registration page</h1>

<form action="" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text"
               class="form-control<?php echo $model->hasError('name') ? ' is-invalid' : '' ?>"
               id="name" name="name" aria-describedby="nameHelp">
        <?php if (!empty($model->errors['name'])) : ?>
            <div class="form-text" role="alert">
                <?php foreach ($model->errors['name'] as $error) : ?>
                    <p class="mb-1"><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text"
               class="form-control<?php echo $model->hasError('email') ? ' is-invalid' : '' ?>"
               id="email" name="email" aria-describedby="emailHelp">
        <?php if (!empty($model->errors['email'])) : ?>
        <div class="form-text" role="alert">
            <?php foreach ($model->errors['email'] as $error) : ?>
                <p class="mb-1"><?= $error ?></p>
            <?php endforeach; ?>
        </div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password"
               class="form-control<?php echo $model->hasError('password') ? ' is-invalid' : '' ?>"
               id="password" name="password" aria-describedby="passwordHelp">
        <?php if (!empty($model->errors['password'])) : ?>
            <div class="form-text" role="alert">
                <?php foreach ($model->errors['password'] as $error) : ?>
                    <p class="mb-1"><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <div class="mb-3">
        <label for="confirm" class="form-label">Confirm password</label>
        <input type="password"
               class="form-control<?php echo $model->hasError('confirm') ? ' is-invalid' : '' ?>"
               id="confirm" name="confirm" aria-describedby="confirmHelp">
        <?php if (!empty($model->errors['confirm'])) : ?>
            <div class="form-text" role="alert">
                <?php foreach ($model->errors['confirm'] as $error) : ?>
                    <p class="mb-1"><?= $error ?></p>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>