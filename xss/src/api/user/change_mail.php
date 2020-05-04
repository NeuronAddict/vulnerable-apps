<?php

require '../../user.class.php';
require '../../cors.php';

if(!isset($_SESSION))
{
    session_start();
}

if($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header ("Access-Control-Allow-Methods: POST, OPTIONS");
    header ("Access-Control-Allow-Headers: Content-Type");
    header('Access-Control-Max-Age: 0');
    add_cors_header();
    return;
}


if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin() && $_SERVER['REQUEST_METHOD'] === 'POST') {

    $json = file_get_contents('php://input');

    // Converts it into a PHP object
    $data = json_decode($json);

    if( $data->login && $data->mail ) {
        $mail = $data->mail;
        $user = $data->login;

        try {


            $conn = new mysqli('mysql', 'mysql', 'mysql', 'db');

            // Check connection
            if ($conn->connect_error) {
                die("Connection failed: " . $conn->connect_error);
            }

            $stmt = $conn->prepare("UPDATE user set mail = ? WHERE login = ?");
            $stmt->bind_param("ss", $new_mail, $new_user);
            $new_mail = $mail;
            $new_user = $user;

            $stmt->execute();

            $stmt->close();
            $conn->close();

            header('Content-Type: application/json');
            add_cors_header();
            echo json_encode(array("success" => true));

        }
        catch (Exception $e) {
            header('Content-Type: application/json');
            echo json_encode(array("success" => false, "stackstrace" => $e));
        }
    }




}
else {
    header('HTTP/1.0 403 Forbidden');

    echo 'You are forbidden!';
}


?>