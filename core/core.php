<?php  
	// Server constants
	define('CONT_DIR', 'core/controllers/');
	define('TEMP_DIR', 'app/view/templates/');

	// Includes all the classes broght by Composer
	require 'vendor/autoload.php';

	// the .env file settings
	$dotenv = new Dotenv\Dotenv(dirname(__DIR__));
	$dotenv->load();
?>