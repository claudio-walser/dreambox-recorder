<?php

namespace DreamboxRecorder;


final class Application  extends \Spaf\Core\Application{

	private $_application = null;
	private $_type = 'php';
	private $_types = array('php', 'json', 'xml');
	private $_registry = null;
	private $_response = null;
	private $_request = null;

	public function __construct($type = 'php') {
		parent::__construct();
		if (in_array($type, $this->_types)) {
			$this->_type = $type;
		}
		
		switch ($this->_type) {
			case 'php':
				$this->_response = new \Spaf\Core\Response\Php();
				$this->_request = new \Spaf\Core\Request\Php();
				break;
			
			default:
				$this->_response = new \Spaf\Core\Response\Json();
				$this->_request = new \Spaf\Core\Request\Http();
				break;
		}

		$this->_registry = \Spaf\Core\Registry::getInstance();
		$this->_registry->set('request', $this->_request, true);
		$this->_registry->set('response', $this->_response, true);

	}

	public function run($controller = '\\DreamboxRecorder\\Controller\\NotFound', $action = 'view', $params = array()) {
		if ($this->_type === 'php') {
			// setup for http request
			$this->_request->setParam('controller', $controller);
			$this->_request->setParam('action', $action);
			
			if (!empty($params)) {
				foreach ($params as $key => $value) {
					$this->_request->setParam($key, $value);
				}
			}
		}
		// run application and return
		return parent::run();
	}

}
?>