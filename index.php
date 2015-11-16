<?php

	/* Include App */
	include "App/Core/router.php";
	include "App/Core/controller.php";
	$app = new App;

	/* Call Folder the Use Class */
	function __autoload($className)
	{
		if(file_exists($file = 'App/Controller/' . $className . '.php'))
		{
			require_once $file;
		}

		if(file_exists($file = 'App/Model/' . $className . '.php'))
		{
			require_once $file;
		}
	}

	/* Show URL */
	$url = $app->parseUrl();
	if(isset($url))
	{
		var_dump($url);
	}
?>