<div class="page">
    <form class="form-horizontal" id="deposit" method='post' action='<?=base_url()?>myaccount/deposit'>
        <input type="hidden" id="form3" name="form3" value="form3">
        <fieldset>
            <legend><a href="<?= base_url(); ?>myaccount">Personal details</a> | Deposit | <a href="<?= base_url(); ?>myaccount/history">History</a></legend> 
            <?php
            if (isset($message3)) {
                echo "<h4>" . $message3 . "</h4>";
            }?>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <label style="color:red; font-size: 11px;"><?= isset($form3) ? $form3 : '' ?></label>
                </div>
            </div>                
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <blockquote>  <p>Your Deposit amount now equal to: <span><?= $this->session->userdata('balance'); ?>$</span></p>  </blockquote>
                </div>
            </div>                
            <div class="control-group">
                <label class="control-label">Amount of deposit in $:</label>
                <div class="controls">                
                    <input class="span2 input-medium" id="appendedInputButton" type="text" name="amount">
                    <button class="btn btn-success" name="submit" type="submit">Deposit</button>
                </div>
            </div>    
        </fieldset>
    </form>    
</div>
