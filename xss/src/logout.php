<?php

session_start();
$_SESSION['logged'] = array();

require 'header.php';

header('Location: index.php');

session_destroy();
?>