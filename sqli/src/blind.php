<h2>Blind injection</h2>

<p>
    I'm too lazy...
    There is a query but no result is displayed.
</p>

<?php

function log_($str) {
	if ($_REQUEST['log']=='1') {
		echo "<p>$str</p>\n";
	}
}


if(isset($_GET['id'])) {

    $id = $_GET['id'];

	$mysqli = mysqli_connect('mysql', 'mysql', 'mysql', 'db');

	$query = "SELECT id, name, text FROM comments WHERE id=$id";

    log_('[*] "' . print_r($query, true) . '"');

    echo '<br /><br />';

    $res = $mysqli->query($query);

	if($res) {
        echo 'here is a result?';

    }
    else {
        log_( "[-] ". $mysqli->error);
    }

}

?>


