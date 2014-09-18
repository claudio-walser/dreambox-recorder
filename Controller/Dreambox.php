<?php
namespace DreamboxRecorder\Controller;

class Dreambox extends AbstractController {

	private $_address = '';
	private $_apiClient = null;

	public function init() {
		parent::init();
		$this->_address = $this->_config->dreambox->address;
		$this->_apiClient = new \DreamboxRecorder\Core\ApiClient();
	}

	public function view() {
		return $this->_response->write($this->_address);
	}

	public function getBouquets() {

	}

	public function getChannels() {
		$bouquets = $this->_request->getParam('bouquets', 'all');

		$url = $this->_address . '/web/getservices';
		$response = $this->_xmlToObject($this->_apiClient->processUrl($url));
		
		$bouquets = array();

		if (!empty($response)) {
			foreach ($response->e2service as $bouquet) {
				array_push($bouquets, $bouquet->e2servicename);
			}
		}

		return $this->_response->write($bouquets);
	}


}
?>