<?php

if(!isset($_SESSION))
{
    session_start();
}

$_SESSION['user'] = array();

require 'header.php';

header('Location: index.php');

session_destroy();
?>