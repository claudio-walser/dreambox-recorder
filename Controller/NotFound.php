<?php

namespace DreamboxRecorder\Controller;

class NotFound extends AbstractController {

	public function view() {
		return $this->_response->write('controller not found');
	}
	
}
?>