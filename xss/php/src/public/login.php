<?php

require_once '../common.php';

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

        $query = "SELECT login, pass FROM user WHERE login = '$login' AND pass = '$pass';";

        $stmt = mysqli_prepare($mysqli, $query);
        if ($stmt) {

            /* execute statement */
            mysqli_stmt_execute($stmt);

            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $login, $pass);

            /* fetch values */
            while (mysqli_stmt_fetch($stmt)) {
                $_SESSION['logged'] = true;
                setcookie("personal", 'secret data?');
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
        <?php if(!$_SESSION['logged']) { ?>
        <form method="post">
            <label>Login:</label><input  type="text" name="login" />
            <label>Password:</label><input type="password" name="pass" />
            <input class="btn" type="submit" value="Login" />
        </form>
        <?php } ?>
    </div>

</body>

</html>

