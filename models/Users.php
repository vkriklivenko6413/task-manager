<?php 

class Users extends Model {

	public $table = 'users';
	private $salt = '$2a$15$abcdefghijklmnopqrstuv$';

	function get_admin_access ($login, $password) {
		$sql = "SELECT * FROM $this->table WHERE login = '$login'";
		$queryResult = mysqli_query($this->connect, $sql);
		$result = [];
		if ($queryResult !== FALSE) {
	      	$user = $queryResult->fetch_all(MYSQLI_ASSOC);
	      	$checked = password_verify($password, $user[0]['hash']);
	    	$this->connect->close();
		}
		return $checked;
	}

}

?>
