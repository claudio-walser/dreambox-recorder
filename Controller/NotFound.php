<?php

namespace DreamboxRecorder\Controller;

class NotFound extends \Spaf\Core\Controller\Abstraction {

	public function view() {
		return $this->_response->write('controller not found');
	}
	
}
?>