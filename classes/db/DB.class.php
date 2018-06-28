<?php 
class Db { 

	function __construct() { 
		$this->mysql = new mysqli('localhost', '', '', 'compect') or die('problem'); 
	}

	function add_new_todo( $todo ) {

		$position = 0;

		$query = 'INSERT INTO todo_list VALUES (NULL, '.$position.', "'.$todo.'" )';
		$result = $this->mysql->query($query) or die("ERROR with INSERT INTO todo_list");
		
		$query = 'SELECT * FROM todo_list WHERE todo LIKE "'.$todo.'"';
		$result = $this->mysql->query($query) or die("ERROR with SELECT * FROM todo_list");

		$row = $result->fetch_array();
		$id = $row['id'];
		return $row;
		}

	function delete_by_id( $id ) { 
		$query = "DELETE from todo_list WHERE id = $id";
		$result = $this->mysql->query($query) or die("ERROR with DELETE from todo_list"); 

		#if($result) return 'Success'; 
	}

	function update_position( $id, $position ) {
		$query = "UPDATE todo_list SET position = $position WHERE id = $id;";
		//echo $query;
		$result = $this->mysql->query($query) or die("ERROR with UPDATE todo_list SET position");
	}

} // end class
?>
