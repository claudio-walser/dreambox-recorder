<?php
namespace DreamboxRecorder\Controller;

class Dreambox extends AbstractController {

	public function view() {
		return $this->_response->write($this->_config->dreambox->address);
	}
}
?>