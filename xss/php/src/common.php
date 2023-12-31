<?php
require __DIR__ . '/vendor/autoload.php';

$dotenv = Dotenv\Dotenv::createImmutable(__DIR__);
$dotenv->load();
$dotenv->required('MARIADB_HOST', 'MARIADB_USER', 'MARIADB_PASSWORD', 'MARIADB_DATABASE')->notEmpty();

$mysqli = mysqli_connect($_ENV['MARIADB_HOST'], $_ENV['MARIADB_USER'], $_ENV['MARIADB_PASSWORD'], $_ENV['MARIADB_DATABASE']);
