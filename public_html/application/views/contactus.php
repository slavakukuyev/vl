<div class="span9">
    <div class="hero-unit">
        <h1>Video Library</h1>
        <p>Video Library was a publicly traded video rental shop based in San Diego, California. It had 80 franchises from 1985 through 1989 before they were acquired and converted into Blockbuster Video in 1989.</p>                
    </div>        
    <div>
        <form class="form-horizontal" id="contactForm" method='post' action='<?= base_url() ?>contactus/send'>              
            <fieldset>
                
                <legend>Contact Us</legend>
                <div class="control-group">
                    <label class="control-label" style="color:red;"><?=isset($message)?$message:''?></label>                    
                </div>
                <div class="control-group">
                    <label class="control-label">Insert Your Name</label>
                    <div class="controls">
                        <input type="text" name="fullname" placeholder="Full Name" value="<?=$this->input->post('fullname')?>">                
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Insert Your E-mail</label>
                    <div class="controls">
                        <input type="text" name="email" placeholder="Email" value="<?=$this->input->post('email')?>">                
                    </div>
                </div>

                <div class="control-group">
                    <label class="control-label">Write Message</label>
                    <div class="controls">
                        <textarea rows="4" name="message" placeholder="Message"><?=$this->input->post('message')?></textarea>                
                    </div>
                </div>


                <div class="control-group">
                    <label class="control-label">Insert text from image</label>
                    <div class="controls">
                        <input type="text" id="captcha" name="captcha" value="">
                        <?= $captcha ?>
                    </div>
                </div>
                
                <div class="control-group">                    
                    <div class="controls">
                <input type="submit" id="contactsubmit" name="submit" value="Send">           
                    </div>
                </div>

                
            </fieldset>
        </form>
    </div>            
</div><!--/span-->
</div><!--/row-->
<hr>
</div>



