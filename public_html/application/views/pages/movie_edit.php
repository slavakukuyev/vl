<div class="page">
    <form class="form-horizontal" id="editForm" method='post' action='<?= base_url() ?>movie/edit'>        
        <input type="hidden" id="isform" name="isform" value="isform">
        <fieldset>
            <legend>Edit Movie <a href="<?= base_url() . 'movie?id=' . $movie->id ?>"><?= $movie->name ?></a></legend> 
            <?php
            if (isset($message)) {
                echo "<h4>" . $message . "</h4>";
            }
            ?>
            <div class="control-group">
                <label class="control-label"></label>
                <div class="controls">
                    <label style="color:red; font-size: 11px;"><?= isset($form) ? $form : '' ?></label>
                </div>
            </div>  

            <?php if (isset($listMovies)) { ?>
                <div class="control-group">
                    <label class="control-label">Choose movie to edit</label>
                    <div class="controls">
                        <select name="listMovies" id="listMovies">

                            <?php foreach ($listMovies as $m) { ?>                           
                                <option <?php if ($movie->id == $m['id']) { ?>selected="selected"<?php } ?>value="<?= $m['id'] ?>"><?= $m['name'] ?></option>
                            <?php } ?> 
                        </select>                     

                    </div>
                </div>                    
            <?php } ?>


            <div class="control-group">
                <label class="control-label">Movie ID</label>
                <div class="controls">
                    <label name="id"><?= $movie->id ?></label>
                    <input type="hidden" name="id" value="<?= $movie->id ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Name:</label>
                <div class="controls">
                    <input type="text" id="name" name="name" value="<?= $movie->name ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Year:</label>
                <div class="controls">                            
                    <div class="input-append">
                        <input  type="text" name="year" value="<?= $movie->year ?>">
                    </div>        
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Image URL:</label>
                <div class="controls">
                    <img src="<?= $movie->imgUrl ?>" class="img-rounded main">
                    <input type="text" id="imUrl" name="imgUrl" value="<?= $movie->imgUrl ?>">
                    <a name="fireUploadForm" href="#">change image</a>
                    <?php if ($this->session->userdata('new_image_path')) {  ?>
                               <img src="<?= $this->session->userdata('new_image_path') ?>" class="img-rounded main">
                    <input type="text" id="imUrlnew" name="imgUrlnew" value="<?=$this->session->userdata('new_image_path')?>">     
                                <?php $this->session->unset_userdata('new_image_path');}?>
                    
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Video URL from youtube:</label>
                <div class="controls">
                    <input type="text" id="vidUrl" name="vidUrl" value="<?= $movie->vidUrl ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">DateTime Added:</label>
                <div class="controls">                            
                    <div id="datetimepickerTime" class="input-append">
                        <input data-format="yyyy-mm-dd hh:mm:dd" type="text" name="added" value="<?= $movie->added ?>">
                        <span class="add-on">
                            <i data-time-icon="icon-time" data-date-icon="icon-calendar">
                            </i>
                        </span>
                    </div>        
                </div>
            </div>                       
            <div class="control-group">
                <label class="control-label">Copies:</label>
                <div class="controls">
                    <input class="input-mini" type="text" id="copies" name="copies" default="<?= $movie->copies ?>" value="<?= $movie->copies ?>">                  
                </div>
                <label class="control-label">Copies to add:</label>
                <div class="controls">
                    <select name="addcopies" id="addcopies" class="selectpicker">
                        <option>1</option>
                        <option>2</option>
                        <option>3</option>
                        <option>4</option>
                        <option>5</option>    
                        <option>10</option>    
                        <option>20</option>    
                        <option>50</option>    
                        <option>100</option>    
                    </select>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Price:</label>
                <div class="controls">
                    <input type="text" id="price" name="price" value="<?= $movie->price ?>">
                </div>
            </div>
            <div class="control-group">
                <label class="control-label">Categories:</label>
                <div class="controls">
                    <div id="categoriesDiv"><?= $movie->categories ?></div>
                    <input type="hidden" name="categories" id="categories" class="input-xxlarge" default="<?= $movie->categories ?>" value="<?= $movie->categories ?>">
                    <select name="categoriesSelect" multiple="multiple" id="categoriesSelect">
                        <?php foreach ($categories as $c) { ?>                      
                            <option <?php if (strpos($movie->categories, $c->name) !== false) { ?>selected="selected"<?php } ?> value="<?= $c->name ?>"><?= $c->name ?></option>
                        <?php } ?> 
                    </select>
                    For multiple select press Ctrl key
                </div>                
            </div>            
            <div class="control-group">
                <label class="control-label">Actors:</label>
                <div class="controls">
                    <div id="actorsDiv"><?php
                        foreach ($actorsOfTheMovie as $a) {
                            echo "(id:" . $a->actorid . ') name:' . $a->fullname;
                        }
                        ?></div>
                    <input type="hidden" name="actors" id="actors" class="input-xxlarge" default="<?php
                        foreach ($actorsOfTheMovie as $a) {
                            echo $a->actorid . ",";
                        }
                        ?>" value="<?php
                           foreach ($actorsOfTheMovie as $a) {
                               echo $a->actorid . ",";
                           }
                        ?>">
                    <select name="actorsSelect" multiple="multiple" id="actorsSelect">                     
                        <?php foreach ($actors as $a) { ?>
                            <?php
                            foreach ($actorsOfTheMovie as $am) {
                                $contains = false;
                                if ($am->actorid == $a->id) {
                                    $contains = true;
                                    break;
                                }
                            }
                            ?>
                            <option <?php if ($contains == true) { ?>selected="selected"<?php } ?>value="<?= $a->id ?>"><?= $a->fullname ?></option>
                        <?php } ?> 
                    </select>
                    For multiple select press Ctrl key
                </div>                
            </div>   

            <div class="control-group">
                <label class="control-label">About:</label>
                <div class="controls">
                    <textarea rows="10" name="about" class="input-block-level"><?= isset($movie->about) ? $movie->about : '' ?></textarea>
                </div>
            </div>

            <div class="control-group">                
                <div class="controls">                                    
                    <button class="btn btn-success" name="submit" type="submit">Edit</button>
                </div>
            </div>    
        </fieldset>
    </form>    
</div>


<form class="hidden" id="changeidForm" method='post' action='<?= base_url() ?>movie/edit_page'>    
    <input type="hidden" name="id" id="newid">
    <input type="submit" id="changeid" name="submit">
</form>



<?php
$path = $_SERVER['REQUEST_URI'];
$pathFragments = explode('/', $path);
$end = end($pathFragments);
?>

<form class="hidden" id="uploadForm" method='post' action='<?= base_url() ?>movie/upload'>    
    <input type="hidden" name="movieid" value="<?=$movie->id?>">
    <input type='hidden' name="pageID" value="<?=$end?>">
    <input type="submit" id="uploadsubmit" name="submit">
</form>