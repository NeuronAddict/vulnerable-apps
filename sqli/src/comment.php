<h2>filtered injection</h2>

<p>special chars ('";#-) are filtereds, can you inject me?</p>
<p>note : to see log, set a cookie, get or post log=1</p>

<a href="/comment.php?id=1">/comment.php?id=1</a>

<?php

function log_($str) {
	if ($_REQUEST['log']=='1') {
		echo "<p>$str</p>\n";	
	}
}

function filter($id) {
	$ret = preg_replace('/[\'";#-]/', '', $id);
	log_("[*] filter id : \"$id\" ==> \"$ret\"");
	return $ret;
}

if(isset($_GET['id'])) {

	$id = filter($_GET['id']);

	$mysqli = mysqli_connect('mysql', 'mysql', 'mysql', 'db');
	
	$query = "SELECT id, name, text FROM comments WHERE id=$id";

    log_('[*] "' . print_r($query, true) . '"');

    echo '<br /><br />';

    $res = $mysqli->query($query);
	
	if($res) {
		$res->data_seek(0);
		if ($row = $res->fetch_assoc()) {
			echo "<p>comment " . $row['id'] . "</p><h2>" . $row['name'] . "</h2><p>" . $row['text'] . "</p>";
		}
        else {
            log_("[-] No results");
        }
    }
    else {
        log_( "[-] ". $mysqli->error);
    }

}

?>


