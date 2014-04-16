<div class="page">
<form class="form-horizontal" id="personaldetails" method='post' action='<?=base_url();?>myaccount/change_details'>
     <input type="hidden" id="form1" name="form1" value="form1">
    <fieldset>
        <legend>Personal details | <a href="<?=base_url();?>myaccount/depositpage">Deposit</a> | <a href="<?=base_url();?>myaccount/history">History</a></legend> 
        <?php if (isset($message)) {
            echo "<h4>".$message."</h4>";
        }?>
        <div class="control-group<?php if(isset($form2)){ ?> hidden<?php } ?>">
            <label class="control-label"></label>
            <div class="controls">
                <label style="color:red; font-size: 11px;"><?=isset($form1)?$form1:''?></label>
            </div>
        </div>  
        <div class="control-group">
            <label class="control-label">Personal ID:</label>
            <div class="controls">
                <span name="id" class="label success"><?=$this->session->userdata('id')?></span>
            </div>
        </div>      

        <div class="control-group">
            <label class="control-label">First Name:</label>
            <div class="controls">
                <input type="text" id="firstname" name="firstname" value="<?=$this->session->userdata('firstname');?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Last Name:</label>
            <div class="controls">
                <input type="text" id="lastname" name="lastname" value="<?=$this->session->userdata('lastname');?>">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Email</label>
            <div class="controls">
                <input type="text" id="email" name="email" value="<?=$this->session->userdata('email');?>">
            </div>
        </div>
         <div class="control-group">
            <label class="control-label">Sex</label>
            <div class="controls">
                
				<input type="radio" value="male" id="sex_0" name="sex" <?php if($this->session->userdata('sex' ) == 'male'){?>checked="checked"<?php }?>>male
				<input type="radio" value="female" id="sex_1" name="sex" <?php if($this->session->userdata('sex') == 'female'){?>checked="checked"<?php }?>>female
                
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Birth Date:</label>
            <div class="controls">                            
                <div id="datetimepicker" class="input-append">
                    <input data-format="yyyy-MM-dd" type="text" name="birthdate" value="<?=trim($this->session->userdata('birthdate'))?>">
                    <span class="add-on">
                        <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                        </i>
                    </span>
                </div>        
            </div>
        </div>       
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <button type="submit" class="btn btn-success" >Change</button>
            </div>
        </div>
    </fieldset>
</form>



<form class="form-horizontal" id="changepassword" method='post' action='<?=base_url();?>myaccount/changepassword'>
      <input type="hidden" id="form2" name="form2" value="form2">
    <fieldset>
        <legend>Change password</legend>
         <?php if (isset($message2)) {
            echo "<h4>".$message2."</h4>";
        }?>
 <div class="control-group<?php if(isset($form1)){ ?> hidden<?php } ?>">
            <label class="control-label"></label>
            <div class="controls">
                  <label style="color:red; font-size: 11px;"><?=isset($form2)?$form2:''?></label>
            </div>
        </div>        
        <div class="control-group">
            <label class="control-label">Old Password:</label>
            <div class="controls">
                <input type="password" id="password" name="oldpassword">
                  <input type="hidden" id="email" name="email" value="<?=$this->session->userdata('email');?>">
            </div>
        </div>

        <div class="control-group">
            <label class="control-label">New Password:</label>
            <div class="controls">
                <input type="password" id="password" name="password">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label">Confirm Password:</label>
            <div class="controls">
                <input type="password" id="passwordconfirm" name="passwordconfirm">
            </div>
        </div>
        <div class="control-group">
            <label class="control-label"></label>
            <div class="controls">
                <button type="submit" class="btn btn-success" >Change</button>
            </div>
        </div>
    </fieldset>
</form>
    
    </div>