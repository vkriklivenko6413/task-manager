<?php
session_start();
class UserController extends Controller
{

	function signin_admin () {
		$login = $_POST['login'];
		$password = $_POST['password'];
		$success = $this->userModel->get_admin_access($login, $password);
		if ($success) {
			$_SESSION['is_admin'] = true;
			$_SESSION['login'] = $login;
		} else {
			$success = 'The login details are incorrect.';
		}
		echo $success;
	}

	function logout () {
		session_destroy();
	}

}
?>