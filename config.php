<?php
	
	define('ENVIROMENT', "debug");

	if ( ENVIROMENT == 'debug') {

		define('BASE_DIR', $_SERVER['DOCUMENT_ROOT'] . '/projects/git/servclick/');

	} else {

		define('BASE_DIR', 'www.servclick.com.br');

	}
	
	/* carrega os arquivos de classes do sistema */
	spl_autoload_register(function($class) {

		if ( file_exists(BASE_DIR . 'controller/' . $class . '.php') ) {

			require_once (BASE_DIR . 'controller/' . $class . '.php');

		} elseif ( file_exists(BASE_DIR . 'model/dao/' . $class . '.php') ) {
			
			require_once (BASE_DIR . 'model/dao/' . $class . '.php');

		} elseif ( file_exists(BASE_DIR . 'class/' . $class . '.php') ) {
		
			require_once (BASE_DIR . 'class/' . $class . '.php');

		} elseif ( file_exists(BASE_DIR . 'config/' . $class . '.php') ) {

			require_once (BASE_DIR . 'config/' . $class . '.php');

		} else {

			require_once (BASE_DIR . '404.php');

		}

	});

?>