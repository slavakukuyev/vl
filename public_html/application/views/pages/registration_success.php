<div>
    <?php
    if ($success == 1)
        echo '<h2>Thank you for successfully completing your online registration form!</h2>'
        . '<p>You may start rent the movies from our <a href="' . base_url('main') . '">Video Library</a></p>';
    else
        echo '<h2>Message: Unable to register. An unknown error has occurred.</h2> <p>Please contact us from <a href="' . base_url('contactus') . '">here</a></p>'
        ?>
</div>