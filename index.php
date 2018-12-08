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


	/** ADD COMMENT **/
	if (isset($_GET['view'])) {
		if (file_exists(CONT_DIR . strtolower($_GET['view']) . '_controller.php')) {
			include CONT_DIR . strtolower($_GET['view']) . '_controller.php';
		}else {
			echo '404';
		}
	}else {
		include CONT_DIR . 'portfolio_controller.php';
	}


	// Tasks
	// add comments in the project_controller.php
	// add comments to the rotuer in the index.php
	// Male the code in class.Behance_API.php more DRY
	// make more readebale the code in the requests-handler.js

	// check for the http_code: 200
?>