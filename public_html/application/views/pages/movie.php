<div>
    <img src="<?= $movie->imgUrl ?>" class="img-polaroid">
    <?php
    if (isset($message)) {
        echo "<span style='color:red;'>" . $message . "</span>";
    }
    ?>

    <?php if ($this->session->userdata('isLoggedIn') == true) { ?>
        <div class="actions">
            <form id="rentForm" method='post' action='<?= base_url(); ?>movie/rent'>
                <input type="hidden" name="id" value="<?= $movie->id ?>">
                <input type="hidden" name="price" value="<?= $movie->price ?>">   
                <input type="submit" name="rent" class="btn btn-primary" value="BUY"> price(<?= $movie->price ?>$)
            </form>
            <?php if ($this->session->userdata('isadmin') == true) { ?> 
                <form id="editForm" method='post' action='<?= base_url() ?>movie/edit_page'>
                    <input type="hidden" name="id" value="<?= $movie->id ?>">
                    <input type="submit" name="edit" class="btn btn-info" value="Edit">
                </form>   
                <a href="<?= base_url() ?>movie/add" class="btn btn-success">Add Movie</a>    
            <?php } ?>
        </div>
    <?php } ?>

    <h2><?= $movie->name ?> <span style="font-size: 17px;">(<?= $movie->year ?>)</span></h2>    
    <p>categories:  <?php
    $categories = '';
    foreach ($movieCategories as $category) {
        $categories = $categories . '<a href="' . base_url() . 'main?category=' . $category . '">' . $category . '</a>, ';
    }
    echo substr($categories, 0, -2);
    ?></p>

    <p>actors:
        <?php
        foreach ($actorsOfTheMovie as $a) {            
            echo '<a href="#" name="actorsLink" actorid="' . $a->actorid . '">' . $a->fullname . '</a>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;';
        }
        ?>

    <form id="actorForm" class="hidden" method='post' action='<?= base_url(); ?>actor'>
        <input type="hidden" name="actorid" value="">    
        <input type="submit" id="actorsubmit">
    </form>
</p>


<p><?= $movie->about ?></p>
<br/>
<?php if ($this->session->userdata('isLoggedIn') === true) { ?>
    <div id="videoDemo">
        <iframe width="420" height="315" src="<?= $movie->vidUrl ?>" frameborder="0" allowfullscreen=""></iframe>
    </div>
<?php } ?>  

<hr>
<h3>Comments: </h3>
<?php if(isset($comments) && $comments!==FALSE){
     foreach ($comments as $comment){
         echo '<p>user: <b style="color:#46B525">'.$comment->firstname.' '.$comment->lastname.'</b><br />comment:'.$comment->text.'
             
</p><br />';
     }
     echo '<br />';
}?>


<?php if (isset($messageComment)) { ?>
    <label style="color:red;"><?= $messageComment ?></label>
<?php } ?>
<form id="reviewForm" method='post' action='<?= base_url(); ?>movie/comment'>
    <label><b>Add comment:</b></label>
<!--<p>
    <label>Rate the movie: </label>
    <label class="checkbox inline"> <input type="radio" name="rate" value="option1">1</label>
    <label class="checkbox inline"> <input type="radio"  name="rate" value="option2">2</label>
    <label class="checkbox inline">  <input type="radio" name="rate" value="option3">3</label>
    <label class="checkbox inline"> <input type="radio"  name="rate" value="option4">4</label>
    <label class="checkbox inline"> <input type="radio"  name="rate" checked="checked" value="option5">5</label>
</p>-->
    <br />
    <textarea class="form-control" name="comment"  rows="3"></textarea>
    <input type="hidden" name="id" value="<?= $movie->id ?>"><br />
      <input type="text" id="captcha" name="captcha" value="">
                <?=$captcha?>
    <input type="submit" id="commentsubmit" value="Add">

</form>
<?php if ($this->session->userdata('isLoggedIn') === false) { 
    echo "<label>*Only registered users may leave comments according to <b>".$movie->name."</b> movie</label>";
 } ?>

</div>