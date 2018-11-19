<?php  
	/**
	* This is the controller for the view.
	*
	* Here I make the calls to the Behance API class to retrive information from
	* Behance.
	*
	* @author Gamertod
	*/

	/**
	* Renaming the Behance API class.
	*/
	use BehanceAPI\BehanceAPI;

	/**
	* Make the BehanceAPI() object.
	*
	* @return class
	*/
	$BehanceAPI = new BehanceAPI();

	/**
	* @method Makes the request to the Behance API to retrive user information
	*/
	$BehanceAPI->user_data();

	/**
	* @method Makes the request to the Behance API to retrive projects information
	*/
	$BehanceAPI->user_projects();

	/**
	* @var Have all the user inforamtion pulled from Behance
	*/
	$user = $BehanceAPI->user_data['user'];

	/**
	* @var Have all the projects inforamtion pulled from Behance
	*/
	$projects = $BehanceAPI->user_projects['projects'];

	/**
	* Inlcude the view.
	*/
	include TEMP_DIR . 'home.php';
?>