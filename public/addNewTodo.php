<?php 
require_once '../classes/db/DB.class.php';
$db = new Db();

$todo = $_POST['todo'];
$response = $db->add_new_todo( $todo );

$jsonData = json_encode($response);
echo $jsonData;
?>