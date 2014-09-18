<?php

namespace DreamboxRecorder\Dto;

class Bouquet {
	
	private $_name = '';
	private $_reference = '';



	public function setName($name) {
		$this->_name = (string) $name;
	}

	public function getName() {
		return $this->_name;
	}

	public function setReference($reference) {
		$this->_reference = (string) $reference;
	}

	public function getReference() {
		return $this->_reference;
	}

}
?>