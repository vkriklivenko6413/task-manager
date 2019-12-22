<?php 
session_start();
class Tasks extends Model {

	public $table = 'tasks';

	function get_all_tasks () {
		$sql = "SELECT * FROM $this->table";
		$queryResult = mysqli_query($this->connect, $sql);
		$result = [];
		if ($queryResult !== FALSE) {
	      	$result = $queryResult->fetch_all(MYSQLI_ASSOC);
	    	$this->connect->close();
		}
		return $result;
	}

	function add_task ($user_name, $email, $description) {
		$currentDate = date('Y-m-d');
		$sql = "INSERT INTO $this->table (user_name, email, description, created_at) VALUES ('$user_name', '$email', '$description', $currentDate)";
		$queryResult = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
		return $queryResult;
	}

	function change_record_column ($task_id, $value, $column) {
		if (isset($_SESSION['is_admin'])) {
			$sql = "UPDATE $this->table SET $column = '$value' WHERE id = $task_id";
			$queryResult = mysqli_query($this->connect, $sql) or die(mysqli_error($this->connect));
			if ($column == 'description') {
				$query = "UPDATE $this->table SET is_changed = 1 WHERE id = $task_id";
				$queryResult = mysqli_query($this->connect, $query) or die(mysqli_error($this->connect));
			}
			$this->connect->close();
		} else {
			$queryResult = 'Sign In please';
		}
		return $queryResult;
	}
}
?>
