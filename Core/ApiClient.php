<?php

namespace DreamboxRecorder\Core;

class ApiClient {
	
	private $curl = null;

	public function __construct() {
		$this->curl = \curl_init();
	}

	public function processUrl($url, Array $postData = array(), $timeout = 5) {
		// set URL and other appropriate options
		curl_setopt($this->curl, CURLOPT_URL, $url);
		curl_setopt($this->curl, CURLOPT_HEADER, 0);
		curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);
		curl_setopt($this->curl, CURLOPT_CONNECTTIMEOUT, $timeout);
		
		// post data if needed
		if (!empty($postData)) {
			curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($postData));
		}
		// grab URL and fetch content
		$data = curl_exec($this->curl);
		// close cURL resource, and free up system resources
		curl_close($this->curl);

		return $data;
	}
	
}

?>