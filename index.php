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
	* This is the router itself.
	*
	* In any other project, the router based on any mechanism would include
	* one controller based on the link/url entered, in this case there's only 1 
	* page so it doesn't matter wich url the user enters, we'll include just I 
	* controller
	*
	* @return controllers
	*/
	include CONT_DIR . 'portfolio_controller.php';
?>