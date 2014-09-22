<?php

namespace DreamboxRecorder;


final class Application  extends \Spaf\Core\Application{

	protected $_application = null;
	protected $_type = 'php';
	protected $_types = array('php', 'json', 'xml');


	public function __construct($type = 'php') {
		parent::__construct();
		if (in_array($type, $this->_types)) {
			$this->_type = $type;
		}
		
		switch ($this->_type) {
			case 'php':
				$response = new \Spaf\Core\Response\Php();
				$request = new \Spaf\Core\Request\Php();
				break;
			
			default:
				$response = new \Spaf\Core\Response\Json();
				$request = new \Spaf\Core\Request\Http();
				break;
		}

		$this->setRegistry(\Spaf\Core\Registry::getInstance());
		$this->setRequest($request);
		$this->setResponse($response);
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