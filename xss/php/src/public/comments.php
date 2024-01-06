<?php

require_once '../common.php';

if(!isset($_SESSION))
{
    session_start();
}

if( isset($_POST['name']) && isset($_POST['text'])) {
    $query = "INSERT INTO comments (name, text) VALUES (?,?)";
    $stmt = mysqli_prepare($mysqli, $query);
    $stmt->bind_param("ss", $_POST['name'], $_POST['text']);
    mysqli_stmt_execute($stmt);
}

$query = "SELECT name, text FROM comments;";

$stmt = mysqli_prepare($mysqli, $query);
if ($stmt) {

    /* execute statement */
    mysqli_stmt_execute($stmt);

    /* bind result variables */
    mysqli_stmt_bind_result($stmt, $name, $text);

    $data = '<table><tbody>';

    /* fetch values */
    while (mysqli_stmt_fetch($stmt)) {
        $data .= "<tr><td>$name</td><td>$text</td></tr>";
    }
    $data .= '</tbody></table>';
    /* close statement */
    mysqli_stmt_close($stmt);
} else {
    echo mysqli_error ( $mysqli );
}

mysqli_close($mysqli);


?>

<h5>Send a message to the community</h5>
<div class="divider"></div>


<?php if($_SESSION['logged']) { ?>

<?php echo $data; ?>
<form method="post">
<p><label>Name:</label> <input type="text" name="name"></p>
<p><label>Message:</label> <input type="text" name="text"></p>
<p><input type="submit" class="btn" value="Ok"></p>
</form>
<?php } else { ?>

    <p class="blue col offset-s1">Please log in to show private comments</p>

<?php } ?>

