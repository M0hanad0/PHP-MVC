<h1>Register</h1>
<?php $form = \App\Core\Forms\Form::begin('post', ''); ?>
<div class="mb-3">
    <div class="row">
        <div class="col">
            <?php echo $form->field($model, 'firstName'); ?>
        </div>
        <div class="col">
            <?php echo $form->field($model, 'lastName'); ?>
        </div>
    </div>
    <?php echo $form->field($model, 'email') ?>
    <?php echo $form->field($model, 'password', \App\Core\Forms\Field::PASSWORD_FIELD); ?>
    <?php echo $form->field($model, 'passwordConfirm', \App\Core\Forms\Field::PASSWORD_FIELD); ?>
</div>

<button type="submit" class="btn btn-primary">Submit</button>
<?php \App\Core\Forms\Form::end(); ?>
<!-- // <form method="POST">
    // <div class="mb-3">
        // <div class="row">
            // <div class="col">
                // </div>
            // <div class="col">

                // <label for="lastname" class="form-label">Last name</label>
                // <input type="text" class="form-control" name="lastname" id="lastname" placeholder="Last name" autofocus>
                // </div>
            // </div>
        // </div>
    // <div class="mb-3">
        // <label for="email" class="form-label">Email</label>
        // <input type="email" class="form-control" id="email" name="email" placeholder="Email">
        // </div>
    // <div class="mb-3">
        // <label for="password">Password</label>
        // <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
        // </div>
    // <div class="mb-3">
        // <label for="password-confirm">Confirm password</label>
        // <input type="password" name="password-confirm" id="password-confirm" class="form-control" placeholder="Confirm password" />
        // </div>
    // <button type="submit" class="btn btn-primary">Submit</button>
    // </form> -->