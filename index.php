<?php  
	/**
	* This is the routher for the project.
	*
	* I like to work on a MVC strcuture.
	* This is the router, this router includes the correct controller of any page.
	* As this is a single page website, it'll include only one contrller 
	*
	*
	* @return controllers
	*/

	/**
	* Includes the file with all the project configuration.
	*/
	include 'core/core.php';


	/**
	* This is the router for the requests sent to this webapp.
	*
	* This router checks for a $_GET['view'] variable, if a router with that 
	* variable value as part of the name, we include it, if no router has that
	* variable value as port of the name, we redirect the user to the main page.
	* If the $_GET['view'] variable is not define, we include the router for the main page.
	*
	* @return void
	*/
	if (isset($_GET['view'])) {
		if (file_exists(CONT_DIR . strtolower($_GET['view']) . '_controller.php')) {
			include CONT_DIR . strtolower($_GET['view']) . '_controller.php';
		}else {
			header('location: ?view=portfolio');
		}
	}else {
		include CONT_DIR . 'portfolio_controller.php';
	}
?>