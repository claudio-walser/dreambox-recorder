<?php
namespace DreamboxRecorder\Controller;

class Dreambox extends AbstractController {

	private $_address = '';
	private $_apiClient = null;

	private $_brefAll = '1:7:1:0:0:0:0:0:0:0:(type == 1) || (type == 17) || (type == 195) || (type == 25) ORDER BY name';

	public function init() {
		parent::init();
		$this->_address = $this->_config->dreambox->address;
		$this->_apiClient = new \DreamboxRecorder\Core\ApiClient();
	}

	public function view() {
		return $this->_response->write($this->_address);
	}

	public function getBouquets() {
		$bouquets = $this->_request->getParam('bouquets', 'all');

		$url = $this->_address . '/web/getservices';
		$response = $this->_xmlToObject($this->_apiClient->processUrl($url));
		
		$bouquets = array();

		if (!empty($response)) {
			foreach ($response->e2service as $bouquet) {
				$dto = new \DreamboxRecorder\Dto\Bouquet();
				$dto->setName($bouquet->e2servicename);
				$dto->setReference($bouquet->e2servicereference);
				array_push($bouquets, $dto);
			}
		}

		return $this->_response->write($bouquets);
	}

	public function getChannels() {
		$bouquetReference = $this->_request->getParam('bouquet', 'all');
		
		$url = $this->_address . '/web/getallservices';
		$response = $this->_xmlToObject($this->_apiClient->processUrl($url));

		if (!empty($response)) {
			foreach ($response->e2bouquet as $bouquet) {
				if ($bouquetReference === $bouquet->e2servicereference) {
					$channels = array();
							
					foreach ($bouquet->e2servicelist->e2service as $service) {
						$dto = new \DreamboxRecorder\Dto\Channel();
						$dto->setName($service->e2servicename);
						$dto->setReference($service->e2servicereference);
						array_push($channels, $dto);
					}
					return $this->_response->write($channels);
				}

			}
		}		

		return $this->_response->write(array());
	}


}
?>