<html>

<body>

    <div>
    
        <form>
            <input type="text" name="login" />
            <input type="password" name="pass" />
            <input type="submit" value="Login" />
        </form>
    
    </div>

    <pre>
        <?php

        $login = ($_REQUEST['login']);
        $pass = ($_REQUEST['pass']);
        
        if($login && $pass) {

            if($_COOKIE['as']) {
                $login = addslashes($login);
                $pass = addslashes($pass);
            }

            $mysqli = mysqli_connect('mysql', 'mysql', 'mysql', 'db');

            $query = "SELECT login, pass FROM user WHERE login = '$login' AND pass = '$pass';";

            print_r($query);

            echo '<br /><br />';

            $stmt = mysqli_prepare($mysqli, $query);
            if ($stmt) {

                /* execute statement */
                mysqli_stmt_execute($stmt);

                /* bind result variables */
                mysqli_stmt_bind_result($stmt, $login, $pass);

                /* fetch values */
                while (mysqli_stmt_fetch($stmt)) {
                    printf ("Logged as %s (%s)\n", $login, $pass);
                }

                /* close statement */
                mysqli_stmt_close($stmt);
            }
            else {
                echo mysqli_error ( $mysqli );
            }

            mysqli_close($mysqli);
        }
        ?>
    </pre>

</body>

</html>

