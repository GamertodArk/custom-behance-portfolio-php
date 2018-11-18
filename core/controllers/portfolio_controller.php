<?php  
	
	use BehanceAPI\BehanceAPI;

	
	$BehanceAPI = new BehanceAPI();
	$BehanceAPI->user_data();
	$BehanceAPI->user_projects();

	$user = $BehanceAPI->user_data['user'];
	$projects = $BehanceAPI->user_projects['projects'];

	// Inlcude the view
	include TEMP_DIR . 'home.php';
?>