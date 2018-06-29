<?php

class create_DB {
	const HOST = '';
	const USER = '';
	const PASW = '';
	const DATABASE = 'compect';
	const TABLE = 'todo_list';

	function __construct() { 
		$this->mysql = new mysqli( self::HOST, self::USER, self::PASW ) or die('problem'); 
	}

	function create_new_database_with_todo_list_table() {
		$query = "CREATE DATABASE IF NOT EXISTS ".self::DATABASE." DEFAULT CHARACTER SET = 'utf8' DEFAULT COLLATE = 'utf8_general_ci';";
		
		$result = $this->mysql->query( $query ) or die("ERROR with CREATE Database");

		mysqli_select_db( $this->mysql, self::DATABASE);
		
		$sql = 'CREATE TABLE '.self::TABLE.'( '.
		'id INT NOT NULL AUTO_INCREMENT, '.
		'position INT NOT NULL, '.
		'todo TEXT NOT NULL, '.
		'primary key ( id ))';

		$result = $this->mysql->query( $sql ) or die( "ERROR with CREATE TABLE ".self::TABLE);

		if ( $result ) {
			echo "Database ".self::DATABASE." and table ".self::TABLE." created";
		}

	}
}

class Db { 

	const HOST = '';
	const USER = '';
	const PASW = '';
	const DATABASE = 'compect';
	const TABLE = 'todo_list';
	
	function __construct() { 
		$this->mysql = new mysqli( self::HOST, self::USER, self::PASW, self::DATABASE ) or die('problem'); 
	}


	function add_new_todo( $todo ) {

		$position = 0;

		$query = 'INSERT INTO '.self::TABLE.' VALUES (NULL, '.$position.', "'.$todo.'" )';
		$result = $this->mysql->query($query) or die("ERROR with INSERT INTO ".self::TABLE);
		
		$query = 'SELECT * FROM '.self::TABLE' WHERE todo LIKE "'.$todo.'"';
		$result = $this->mysql->query($query) or die("ERROR with SELECT * FROM ".self::TABLE);

		$row = $result->fetch_array();
		$id = $row['id'];
		return $row;
		}

	function delete_by_id( $id ) { 
		$query = "DELETE from ".self::TABLE." WHERE id = $id";
		$result = $this->mysql->query($query) or die("ERROR with DELETE from ".self::TABLE); 
	}

	function update_position( $id, $position ) {
		$query = "UPDATE ".self::TABLE." SET position = $position WHERE id = $id;";
		$result = $this->mysql->query($query) or die("ERROR with UPDATE ".self::TABLE." SET position");
	}

} // end class
?>
