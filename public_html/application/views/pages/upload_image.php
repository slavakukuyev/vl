<div>
                    <?php if(isset($messageUpload)){echo $messageUpload;}?>
                  
                    <?php echo form_open_multipart(base_url().'movie/upload');?>
                    <input type="file" name='userfile'>
                    <input type="submit" name='file_submit' value='upload image'>
                    </form>
                    
                    <a href="<?=base_url().'movie/upload_disable'?>">return</a>

                

</div>