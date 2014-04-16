





<div class="span9">
    <div class="hero-unit">
        <h1>Video Library</h1>
        <p>Video Library was a publicly traded video rental shop based in San Diego, California. It had 80 franchises from 1985 through 1989 before they were acquired and converted into Blockbuster Video in 1989.</p>                
    </div>

    <?php if (isset($category)) echo "<div>Sorted by " . $category . "</div>" ?>

    <?php
    if (isset($recomendedCategory)) {
        echo "<p> Recomended by Category/ies: | ";
        foreach ($recomendedCategory as $rc) {
            echo $rc . " | ";
        }
        echo "</p>";
    }
    ?>

    <?php
    $column = 0;
    echo '<div class="row-fluid">';
    foreach ($rows as $r) {
        if ($column == 3) {
            echo '<div class="row-fluid">';
            $column = 0;
        }
        echo '<div class="span4">';
        echo '<h2><a href="' . base_url() . 'movie?id=' . $r[0]->id . '">' . $r[0]->name . '</a></h2>';
        echo '<img src="' . $r[0]->imgUrl . '" class="img-rounded main">';
        if (isset($new) && $new == 'new') {
            echo '<p>date added: ' . $r[0]->added . '</p>';
        }


        echo '<p>' . substr($r[0]->about, 0, 197) . '...';
        echo '<p><a class="btn" href="' . base_url() . 'movie?id=' . $r[0]->id . '">read more...</a></p>';
        echo ' </div><!--/span-->';

        $column++;
        if ($column == 3) {
            echo '</div>';
        }
    }

    //echo( $movie2->name );
    ?>
</div><!--/span-->
</div><!--/row-->

<hr>
</div>