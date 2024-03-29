<?php 

class Route
{
	static function start()
	{
		// контроллер и действие по умолчанию
		$controller_name = 'Main';
		$action_name = 'index';
		
		$routes = explode('/', $_SERVER['REQUEST_URI']);
		// получаем имя контроллера
		if ( !empty($routes[1]) )
		{	
			$controller_name = $routes[1];
		}
		
		// получаем имя экшена
		if ( !empty($routes[2]) )
		{
			$action_name = preg_replace('/\?(.*?.*)/', '', $routes[2]);
		}

		// добавляем префиксы
		$model_name = 'Model_'.$controller_name;
		$controller_name = $controller_name. 'Controller';
		// подцепляем файл с классом модели (файла модели может и не быть)

		$model_file = strtolower($model_name).'.php';
		$model_path = "./models/".$model_file;
		if(file_exists($model_path))
		{
			include "./models/".$model_file;
		}

		// подцепляем файл с классом контроллера
		$controller_file = $controller_name.'.php';
		$controller_path = "./controllers/".$controller_file;
		if(file_exists($controller_path))
		{
			include "./controllers/".$controller_file;
		}
		else
		{
// var_dump (file_exists($controller_path)); die();
			/*
			правильно было бы кинуть здесь исключение,
			но для упрощения сразу сделаем редирект на страницу 404
			*/
			Route::ErrorPage404();
		}
		
		// создаем контроллер
		$controller = new $controller_name;
		$action = $action_name;
		if(method_exists($controller, $action))
		{
			// вызываем действие контроллера
			$controller->$action();
		}
		else
		{
			echo ('method_exists');
			// здесь также разумнее было бы кинуть исключение
			Route::ErrorPage404();
		}
	
	}
	
	function ErrorPage404()
	{
		// var_dump($test);
        // $host = 'http://'.$_SERVER['HTTP_HOST'].'/';
  //       header('HTTP/1.1 404 Not Found');
		// header("Status: 404 Not Found");
		// header('Location:'.$host.'404');
    }
}

?>