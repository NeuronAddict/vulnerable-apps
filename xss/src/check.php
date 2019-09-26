<?php

$logged = isset($_SESSION['logged']) && $_SESSION['logged'];

if($logged) {
    echo '<p>You are logged !</p>';
}
else {
    echo '<p>not logged :/</p>';
}

?>