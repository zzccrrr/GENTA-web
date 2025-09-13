<!-- WELCOME TEXT -->
<h4>New Account?</h4>
<h6 class="font-weight-light">To register a new account, kindly fill up the following.</h6>

<!-- GET ERROR MESSAGES -->
<?php 
    $fieldErrors = $this->Field->errors($user, ['first_name', 'last_name', 'email', 'password']);
?>

<!-- REGISTER FORM -->
<?= $this->Form->create(NULL, ['url' => ['controller' => 'Users', 'action' => 'register']]) ?>
    <div class="form-group">
        <?= $this->Form->text('first_name', ['class' => 'form-control form-control-lg ' . $fieldErrors['first_name']['class'], 'id' => 'first_name', 'placeholder' => 'First Name', 'required' => 'required']) ?>
        <div class="invalid-feedback">
            <?= $fieldErrors['first_name']['message'] ?>
        </div>
    </div>
    <div class="form-group">
        <?= $this->Form->text('last_name', ['class' => 'form-control form-control-lg ' . $fieldErrors['last_name']['class'], 'id' => 'last_name', 'placeholder' => 'Last Name', 'required' => 'required']) ?>
        <div class="invalid-feedback">
            <?= $fieldErrors['last_name']['message'] ?>
        </div>
    </div>
    <div class="form-group">
        <?= $this->Form->email('email', ['class' => 'form-control form-control-lg ' . $fieldErrors['email']['class'], 'id' => 'email', 'placeholder' => 'Email Address', 'required' => 'required']) ?>
        <div class="invalid-feedback">
            <?= $fieldErrors['email']['message'] ?>
        </div>
    </div>
    <div class="form-group">
        <?= $this->Form->password('password', ['class' => 'form-control form-control-lg ' . $fieldErrors['password']['class'], 'id' => 'password', 'placeholder' => 'Password', 'required' => 'required']) ?>
        <div class="invalid-feedback">
            <?= $fieldErrors['password']['message'] ?>
        </div>
    </div>
    <div class="form-group">
        <?= $this->Form->password('confirm_password', ['class' => 'form-control form-control-lg', 'id' => 'confirm_password', 'placeholder' => 'Confirm Password', 'required' => 'required']) ?>
    </div>
    <div class="mb-4">
        <div class="form-check">
            <label class="form-check-label text-muted">
                <?= $this->Form->checkbox('terms_and_conditions', ['class' => 'form-check-input', 'required' => 'required']) ?> I agree to the Terms & Conditions
            </label>
        </div>
    </div>
    <div class="mt-3">
        <?= $this->Form->button('SIGN UP', ['class' => 'btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn', 'type' => 'submit']) ?>
    </div>
    <div class="text-center mt-4 font-weight-light">
        Already have an account? <?= $this->Html->link('Login', ['controller' => 'Users', 'action' => 'login'], ['escape' => false, 'class' => 'text-primary']) ?>
    </div>
<?= $this->Form->end() ?>