<?php

require './models/Users.php';
require './models/Tasks.php';

class Controller {
	
	public $model;
	public $view;
	public $taskModel;
	public $userModel;
	
	function __construct()
	{
		$this->model = new Model();
		$this->view = new View();
		$this->taskModel = new Tasks();
		$this->userModel = new Users();
	}
	
	function action_index()
	{

	}
}

?>