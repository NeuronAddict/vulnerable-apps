<?php

require 'user.class.php';

if(!isset($_SESSION))
{
    session_start();
}

if( isset($_REQUEST['login']) && $_REQUEST['pass']) {
    $login = ($_REQUEST['login']);
    $pass = ($_REQUEST['pass']);

    if ($login && $pass) {

        if ( isset($_COOKIE['as']) && $_COOKIE['as']) {
            $login = addslashes($login);
            $pass = addslashes($pass);
        }

        $mysqli = mysqli_connect('mysql', 'mysql', 'mysql', 'db');

        $query = "SELECT login, pass FROM user WHERE login = '$login' AND pass = '$pass';";

        $stmt = mysqli_prepare($mysqli, $query);
        if ($stmt) {

            /* execute statement */
            mysqli_stmt_execute($stmt);

            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $login, $pass);

            /* fetch values */
            while (mysqli_stmt_fetch($stmt)) {
                $_SESSION['user'] = new user($login);
                //setcookie("personal", 'secret data?');
                header('Location: /index.php?page=admin');
            }

            /* close statement */
            mysqli_stmt_close($stmt);
        } else {
            echo mysqli_error($mysqli);
        }

        mysqli_close($mysqli);
    }
}

?>
<html>

<body>

    <div>
    
        <form method="post">
            <label>Login:</label><input type="text" name="login" />
            <label>Login:</label><input type="password" name="pass" />
            <input class="btn" type="submit" value="Login" />
        </form>
    
    </div>

</body>

</html>

