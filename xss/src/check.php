<div class="row">
<?php

session_start();

$logged = isset($_SESSION['logged']);

if($logged) {
    echo '<p class="logged-info col offset-s1">You are logged !</p>';
}
else {
    echo '<p class="logged-info col offset-s1">not logged :/</p>';
}

?>
</div>
