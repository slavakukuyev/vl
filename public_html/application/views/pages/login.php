<!DOCTYPE html>
<html lang="en">
    <head>        
        <title>Login Page</title>
         <link href="<?php echo base_url('../media/css/login.css') ?>" rel="stylesheet">   
        

    </head>
    <body>
        <div class="LoginContainer">
        <h3>Login page</h3>
        
        <p>
        <a href="#" >Forgot Password?</a> &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; <a href="<?=base_url();?>registration" >Registration</a>
        </p>
        <?php
        echo form_open($action = 'main/login', $attributes = array('class' => 'form-inline pull-right'));
        $data_input = array('class' => 'input-small', 'name' => 'email', 'placeholder' => 'Email', 'value' => isset($email) ? $email : '');
        echo form_input($data_input);
        echo '<br>';
        $data_password = array('class' => 'input-small', 'name' => 'password', 'placeholder' => 'Password', 'value' => isset($password) ? $password : '');
        echo form_password($data_password);
        echo '<br>';
        echo '<label class="checkbox">
                 ' . form_checkbox() . ' Remember me  </label><br>';
        echo form_submit($data_submit = array('name' => 'submit', 'class' => 'btn', 'value' => 'Sign in'));
        echo '<label style="color:red;">' . validation_errors() . '</label>';
        echo form_close();
        ?>
</div>
    </body>
</html>
