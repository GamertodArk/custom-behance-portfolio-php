<?php
/**
* This file handles the requests for projects sent to the Behance servers.
*
* This file recives a POST request from the client with the project id, then
* with that id, this file sends another requests to the behance servers to 
* pull all the project information with that id, finally we send the whole
* information to the client again so the client can show it.
*
* @return json data
*/

	// Make sure the request we receive was sent by the javascript in the client.
	if ($_POST) {

		// Put the project id into a variable
		$response = json_decode($_POST['data'], true);
		$id = $response['project_id'];

		// Use our custom BehanceAPI class to retrive the whole project information.
		$BehanceAPI = new BehanceAPI\BehanceAPI();
		$BehanceAPI->project_data($id);

		// Finally, we sent the information back to the client
		echo $BehanceAPI->project_info;

	}else {

		// If the user tries to access this file through the browser, we send him back to the main page.
		header('location: ?view=portfolio');
	}
?>