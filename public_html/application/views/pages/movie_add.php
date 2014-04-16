<div class="page">
    <form class="form-horizontal" id="editForm" method='post' action='<?= base_url() ?>movie/add'>        
        <input type="hidden" id="tryadd" name="tryadd" value="true">
        <fieldset>
            <legend>Add Movie<br><span style="font-size:12px;color:blueviolet;">*First of all please upload the image</span></legend>            
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <label style="color:red; font-size: 11px;"><?= isset($form) ? $form : '' ?><?= isset($message) ? $message : '' ?></label>
                </div>
            </div>  
          
            <div class="control-group">
                <label class="control-label">Name:</label>
                <div class="controls">
                    <input type="text" id="name" name="name" value="<?=$this->input->post('name')?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Year:</label>
                <div class="controls">                            
                    <div class="input-append">
                        <input  type="text" name="year" value="<?= $this->input->post('year') ?>">
                    </div>        
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Image URL:</label>
                <div class="controls">
                    <input type="text" id="imUrl" name="imgUrl" value="<?php if($this->session->userdata('new_image_path')){echo $this->session->userdata('new_image_path');}else{echo $this->input->post('imgUrl');}?>">                    
                      <a name="fireUploadForm" href="#">upload image</a>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Video URL from youtube:</label>
                <div class="controls">
                    <input type="text" id="vidUrl" name="vidUrl" value="<?= $this->input->post('vidUrl') ?>">
                </div>
            </div>            
            <div class="control-group">
                <label class="control-label">Copies:</label>
                <div class="controls">
                    <input class="input-mini" type="text" id="copies" name="copies" value="<?= $this->input->post('copies') ?>">                  
                </div>               
            </div>
            <div class="control-group">
                <label class="control-label">Price:</label>
                <div class="controls">
                    <input type="text" id="price" name="price" value="<?= $this->input->post('price') ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Categories:</label>
                <div class="controls">
                    <div id="categoriesDiv"><?= $movie->categories ?></div>
                    <input type="hidden" name="categories" id="categories" class="input-xxlarge" value="<?= $this->input->post('categories') ?>">
                    <select name="categoriesSelect" multiple="multiple" id="categoriesSelect">
                        <?php foreach ($categories as $c) { ?>                      
                            <option  value="<?= $c->name ?>"><?= $c->name ?></option>
                        <?php } ?> 
                    </select>
                    For multiple select press Ctrl key
                </div>                
            </div>            
            <div class="control-group">
                <label class="control-label">Actors:</label>
                <div class="controls">
                    <div id="actorsDiv"></div>
                    <input type="hidden" name="actors" id="actors" class="input-xxlarge" default="" value="">
                    <select name="actorsSelect" multiple="multiple" id="actorsSelect">                     
                        <?php foreach ($actors as $a) { ?>
                            
                            <option value="<?= $a->id ?>"><?= $a->fullname ?></option>
                        <?php } ?> 
                    </select>
                    For multiple select press Ctrl key
                </div>                
            </div>   

            <div class="control-group">
                <label class="control-label">About:</label>
                <div class="controls">
                    <textarea rows="10" name="about" class="input-block-level"><?= $this->input->post('about') ?></textarea>
                </div>
            </div>

            <div class="control-group">                
                <div class="controls">                                    
                    <button class="btn btn-success" name="submit" type="submit">Add</button>
                </div>
            </div>    
        </fieldset>
    </form>    
    <?php
$path = $_SERVER['REQUEST_URI'];
$pathFragments = explode('/', $path);
$end = end($pathFragments);
?>

<form class="hidden" id="uploadForm" method='post' action='<?= base_url() ?>movie/upload'>        
    <input type='hidden' name="pageID" value="<?=$end?>">
    <input type="submit" id="uploadsubmit" name="submit">
</form>
</div>