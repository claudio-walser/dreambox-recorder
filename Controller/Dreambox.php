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

	/**
	 * Optimize this, instead of getting all and loop till you got the right one
	 * see in the docu if there is a api to fetch channels by bouquet.
	 * And implement all channels as well
	 */
	public function getChannels() {
		$bouquetReference = $this->_request->getParam('bouquet', 'all');
		
		#$url = $this->_address . '/web/getallservices';
		$url = $this->_address . '/web/getservices?sRef=' . urlencode($bouquetReference);
		$response = $this->_xmlToObject($this->_apiClient->processUrl($url));

		if (!empty($response)) {
			$channels = array();
			foreach ($response->e2service as $service) {
				$dto = new \DreamboxRecorder\Dto\Channel();
				$dto->setName($service->e2servicename);
				$dto->setReference($service->e2servicereference);
				array_push($channels, $dto);
			}
			return $this->_response->write($channels);

		}		

		return $this->_response->write(array());
	}

	public function getBroadcasts() {
		$serviceReference = $this->_request->getParam('service');
		if ($serviceReference === null) {
			return $this->_response->write(false);
		}
		
		$url = $this->_address . '/web/epgservice?sRef=' . urlencode($serviceReference);
		$response = $this->_xmlToObject($this->_apiClient->processUrl($url));

		$broadcasts = array();
		if (!empty($response)) {
			foreach ($response->e2event as $broadcast) {
				// fetch from controller recording
				$isRecording = $this->controller(
					'\\DreamboxRecorder\\Controller\\Recording',
					'has',
					array(
						'id' => $broadcast->e2eventid
					)
				);
								
				$dto = new \DreamboxRecorder\Dto\Broadcast();
				$dto->setId($broadcast->e2eventid);
				$dto->setIsRecording($isRecording['data']);
				$dto->setTitle($broadcast->e2eventtitle);
				$dto->setTimeStart($broadcast->e2eventstart);
				$dto->setTimeEnd($broadcast->e2eventstart + $broadcast->e2eventduration);
				$dto->setIsOver($dto->getTimeEnd() <= time());
				
				array_push($broadcasts, $dto);
			}
		}

		return $this->_response->write($broadcasts);
	}

}
?>