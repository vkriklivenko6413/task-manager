<?php

class Model
{
	public $connect;

	public function __construct () {
		$this->connect = mysqli_connect("127.0.0.1", "root", "", "task_manager");
		if (!$this->connect) {
		    echo "Error: Unable to connect to MySQL." . PHP_EOL;
		    echo "Debugging errno: " . mysqli_connect_errno() . PHP_EOL;
		    echo "Debugging error: " . mysqli_connect_error() . PHP_EOL;
		    exit;
		}
	}
}

?>