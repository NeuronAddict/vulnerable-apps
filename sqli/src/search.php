<html>

<body>

    <p><a href="/search.php?search=XXX">sqlmap me</a></p>

    <pre>
        <?php

        $search = ($_GET['search']);

        if($_COOKIE['as']) {
            $search = addslashes($search);
        }

        $mysqli = mysqli_connect('mysql', 'mysql', 'mysql', 'db');

        $query = "SELECT id, name, text FROM comments WHERE text LIKE '%$search%'";

        print_r($query);

        echo '<br /><br />';

        $stmt = mysqli_prepare($mysqli, $query);
        if ($stmt) {

            /* execute statement */
            mysqli_stmt_execute($stmt);

            /* bind result variables */
            mysqli_stmt_bind_result($stmt, $id, $name, $comment);

            /* fetch values */
            echo '<table><tbody>';
            while (mysqli_stmt_fetch($stmt)) {
                echo "<tr><td></td>$id<td>$name</td><td>$comment</td></tr>";
            }
            echo '</tbody></table>';

            /* close statement */
            mysqli_stmt_close($stmt);
        }
        else {
            echo mysqli_error ( $mysqli );
        }

        mysqli_close($mysqli);
        ?>
    </pre>

</body>

</html>

