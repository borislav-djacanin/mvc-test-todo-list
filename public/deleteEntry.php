<?php
require_once '../classes/db/DB.class.php';
$db = new Db();
$id = $_POST['id'];

$response = $db->delete_by_id( $id );
?>