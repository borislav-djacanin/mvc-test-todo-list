<?php 
require_once '../classes/db/DB.class.php';
$db = new create_DB();

$db->create_new_database_with_todo_list_table();

?>