<?php


class MainController extends Controller
{

	function index()
	{	
		$tasks = self::get_tasks_data();
		$this->view->generate('main_view.php', 'template_view.php', $tasks);
	}

	function get_tasks_data() {

		$tasks = $this->taskModel->get_all_tasks();
		return $tasks;
	}
	
	function add_task () {
		$user_name = strip_tags($_GET['user_name']);
		$email = strip_tags($_GET['email']);
		$description = strip_tags($_GET['description']);
		$success = $this->taskModel->add_task($user_name, $email, $description);
		echo $success;
	}

	function change_record () {
		$task_id = $_GET['task_id'];
		$value = strip_tags($_GET['value']);
		$column = $_GET['column'];
		$success = $this->taskModel->change_record_column($task_id, $value, $column);
		echo $success;
	}
}
?>