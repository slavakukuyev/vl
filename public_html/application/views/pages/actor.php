<div>
    <h3><?= $actor->fullname ?></h3>
    <img src="<?= $actor->imgUrl ?>" class="img-polaroid">
    <p>was born: <?= $actor->yearbirth ?></p>
    <p>starred in movies: 
        <?php
        echo '<br>';
        foreach ($moviesOfActor as $m) {
            if ($m->instock == 1) {
                echo '<a href="' . base_url() . 'movie?id=' . $m->id . '">' . $m->name . '</a> (' . $m->year . ')<br>';
            } else {
                echo $m->name . ' (' . $m->year . ')   //not in stock<br>';
            }
        }
        ?>    
    </p>
</div>