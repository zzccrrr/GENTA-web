<!-- WELCOME TEXT -->
<h4>Hello! Welcome to GENTA.</h4>
<h6 class="font-weight-light">Log in to continue.</h6>

<!-- LOG IN FORM -->
<?= $this->Form->create(NULL, ['url' => ['controller' => 'Users', 'action' => 'login', '?' => $this->request->getQuery()]]) ?>
    <div class="form-group">
        <?= $this->Form->email('email', ['class' => 'form-control form-control-lg', 'id' => 'email', 'placeholder' => 'Email Address', 'required' => 'required']) ?>
    </div>
    <div class="form-group">
        <?= $this->Form->password('password', ['class' => 'form-control form-control-lg', 'id' => 'password', 'placeholder' => 'Password', 'required' => 'required']) ?>
    </div>
    <div class="mt-3">
        <?= $this->Form->button('LOG IN', ['class' => 'btn btn-block btn-gradient-primary btn-lg font-weight-medium auth-form-btn', 'type' => 'submit']) ?>
    </div>
    <div class="my-2 d-flex justify-content-end align-items-center">
        <!-- <div class="form-check">
            <label class="form-check-label text-muted">
                <?= $this->Form->checkbox('keep_logged_in', ['class' => 'form-check-input']) ?> Keep me logged in
            </label>
        </div> -->

        <!-- <?= $this->Html->link('Forgot password?', ['controller' => 'Users', 'action' => 'forgotPassword'], ['escape' => false, 'class' => 'auth-link text-black']) ?> -->
    </div>
    <div class="text-center mt-4 font-weight-light"> 
        <?= $this->Html->link('Create new account', ['controller' => 'Users', 'action' => 'register'], ['escape' => false, 'class' => 'text-primary']) ?>
    </div>
<?= $this->Form->end() ?>