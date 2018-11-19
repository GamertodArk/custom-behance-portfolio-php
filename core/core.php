<?php 
	/**
	* This file coinstains some of the basic configuration of the project
	*
	* @author Gamertod
	*/


	/**
	* Defines the path for the controllers. 
	*
	* @return void
	*/
	define('CONT_DIR', 'core/controllers/');

	/**
	* Defines the path for view templates.
	*
	* @return void
	*/
	define('TEMP_DIR', 'app/view/templates/');

	/**
	* Includes all the classes broght by Composer.
	*
	* @return composer autoload file
	*/
	require 'vendor/autoload.php';

	/**
	* @var object Contains an instance of the Dotenv() class
	*
	* @return class
	**/
	$dotenv = new Dotenv\Dotenv(dirname(__DIR__));

	/**
	* @var method Call the load of the .env file 
	*
	* @return void
	*/
	$dotenv->load();

?>