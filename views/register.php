<h1>Registration page</h1>

<?php if (!empty($errors)) : ?>
<?php foreach ($errors as $error) : ?>
    <div class="alert alert-danger alert-dismissible fade show" role="alert">
        <?= $error ?>
        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
<?php endforeach; ?>
<?php endif; ?>

<form action="" method="post">
    <div class="mb-3">
        <label for="name" class="form-label">Name</label>
        <input type="text" class="form-control" id="name" name="name">
    </div>
    <div class="mb-3">
        <label for="email" class="form-label">Email</label>
        <input type="text" class="form-control" id="email" name="email">
    </div>
    <div class="mb-3">
        <label for="password" class="form-label">Password</label>
        <input type="password" class="form-control" id="password" name="password">
    </div>
    <div class="mb-3">
        <label for="confirm" class="form-label">Confirm password</label>
        <input type="password" class="form-control" id="confirm" name="confirm">
    </div>
    <button type="submit" class="btn btn-primary">Submit</button>
</form>