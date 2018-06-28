<?php
require_once '../classes/db/DB.class.php';
$db = new Db();

$position = 1;

foreach ($_POST['todo'] as $id) {
	$response = $db->update_position( $id, $position );
	$position = $position +1;
}

?>