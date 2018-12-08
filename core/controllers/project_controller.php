<?php
	// use BehanceAPI\BehanceAPI;

	if ($_POST) {

		$response = json_decode($_POST['data'], true);
		$id = $response['project_id'];


		$BehanceAPI = new BehanceAPI\BehanceAPI();
		$BehanceAPI->project_data($id);
		echo $BehanceAPI->project_info;

	}else {
		header('location: ?view=portfolio');
	}
?>