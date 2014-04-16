<div class="page">
<form class="form-horizontal" id="registration" method='post' action='registration'>
    <fieldset>
        <legend>Registration Form</legend>
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <?php echo '<label style="color:red; font-size: 11px;">' . validation_errors() . '</label>'; ?>
            </div>
        </div>        
        <div class="control-group">
            <label class="control-label">First Name:</label>
            <div class="controls">
                <input type="text" id="firstname" name="firstname" value="<?= isset($firstname) ? $firstname : ''; ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Last Name:</label>
            <div class="controls">
                <input type="text" id="lastname" name="lastname" value="<?= isset($lastname) ? $lastname : ''; ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <input type="text" id="email" name="email" value="<?= isset($email) ? $email : ''; ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Birth date:</label>
            <div class="controls">                            
                <div id="datetimepicker" class="input-append">
                    <input data-format="yyyy-MM-dd" type="text" name="birthdate" value="<?= isset($birthdate) ? $birthdate : ''; ?>">
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                    </span>
                </div>        
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Password:</label>
            <div class="controls">
                <input type="password" id="password" name="password" value="<?= isset($password) ? $password : ''; ?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Confirm Password:</label>
            <div class="controls">
                <input type="password" id="passwordconfirm" name="passwordconfirm" value="<?= isset($passwordconfirm) ? $passwordconfirm : ''; ?>">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label">Insert text from image</label>
            <div class="controls">
                <input type="text" id="captcha" name="captcha" value="">
                <?=$captcha?>
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <button type="submit" class="btn btn-success" >Submit</button>
            </div>
        </div>
    </fieldset>
</form>
    </div>