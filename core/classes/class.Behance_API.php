<?php  
	namespace BehanceAPI;

	/**
	 * This class makes de calls to the Behance API and retrives all the information needed for the project
	 */
	class BehanceAPI
	{
		
		protected $curl_ch;
		protected $user_id;
		protected $per_page;
		protected $client_id;
		protected $api_endpoint;

		public $user_data;
		public $user_projects;

		function __construct()
		{

			// We bring the all the behance credentials 
			$this->user_id = $_ENV['BEHANCE_USER_ID'];
			$this->per_page = $_ENV['BEHANCE_PER_PAGE'];
			$this->client_id = $_ENV['BEHANCE_CLIENT_ID'];
			$this->api_endpoint = $_ENV['BEHANCE_API_ENDPOINT'];

			// Initialize curl
			$this->curl_ch = curl_init();

			// Set some general settings for curl
			curl_setopt($this->curl_ch, CURLOPT_HEADER, false);
			curl_setopt($this->curl_ch, CURLOPT_RETURNTRANSFER, true);

			// I need to desactivate this soon
			curl_setopt($this->curl_ch, CURLOPT_SSL_VERIFYPEER, false);
		}

		// this function brings all the user information
		public function user_data()
		{
			
			// Create the url to call the API
			$url_endpoint = $this->api_endpoint . $this->user_id . '?client_id=' . $this->client_id;

			// Set it to curl
			curl_setopt($this->curl_ch, CURLOPT_URL, $url_endpoint);

			// Execute the call
			$response = curl_exec($this->curl_ch);

			// Check of there's any error
			false === $response ? $this->error_handler() : '';

			// Convert the response into an array
			$user_data = json_decode($response, true);

			// Make the data available for the controller
			$this->user_data = $user_data;
		}

		public function user_projects()
		{
			// Create the url to call the API
			$url_endpoint = $this->api_endpoint . $this->user_id . '/projects?client_id=' . $this->client_id . '&per_page=' . $this->per_page;

			// Set it to curl
			curl_setopt($this->curl_ch, CURLOPT_URL, $url_endpoint);

			// Execute the call
			$response = curl_exec($this->curl_ch);

			// Check of there's any error
			false === $response ? $this->error_handler() : '';

			// Convert the response into an array
			$user_projects = json_decode($response, true);

			// Make the data available for the controller
			$this->user_projects = $user_projects;
		}

		protected function error_handler()
		{
			// print_r(expression)
			echo 'cURL error: ' . curl_error($this->curl_ch);
		}

		function __destruct()
		{
			// close the curl channel
			curl_close($this->curl_ch);
		}
	}
?>