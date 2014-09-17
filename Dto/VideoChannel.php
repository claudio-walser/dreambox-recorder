<?php
namespace DreamboxRecorder\Dto;

class VideoChannel {
	
	private $_id = 0;
	private $_name = 'unknown';

	public function setId($id) {
		$this->_id = (int) $id;
	}

	public function getId() {
		return $this->_id;
	}

	public function setName($name) {
		$this->_name = (string) $name;
	}

	public function getName() {
		return $this->_name;
	}
}
?>