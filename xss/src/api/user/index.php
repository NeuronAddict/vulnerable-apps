<?php

require '../../user.class.php';
require '../../cors.php';

if(!isset($_SESSION))
{
    session_start();
}

if(isset($_SESSION['user']) && $_SESSION['user']->isAdmin()) {

    // dont do this !
    $mysqli = mysqli_connect('mysql', 'mysql', 'mysql', 'db');

    $query = "SELECT login, mail FROM user";

    $stmt = mysqli_prepare($mysqli, $query);

    if ($stmt) {

        /* execute statement */
        mysqli_stmt_execute($stmt);

        /* bind result variables */
        mysqli_stmt_bind_result($stmt, $login, $mail);

        $data = array();

        /* fetch values */
        while (mysqli_stmt_fetch($stmt)) {
            $data[] = array("login" => $login, "mail" => $mail);
        }


        /* close statement */
        mysqli_stmt_close($stmt);
    } else {
        echo mysqli_error($mysqli);
    }

    mysqli_close($mysqli);

    header('Content-Type: application/json');
    add_cors_header();
    echo json_encode($data);

}
else {
    header('HTTP/1.0 403 Forbidden');

    echo 'You are forbidden!';
}


?>