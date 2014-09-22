<?php
namespace DreamboxRecorder\Dto;

class AbstractDto implements \JsonSerializable {
	

	public function jsonSerialize() {
		return  $this->__toArray();
	}

	protected function __toArray() {
		$props = array();

		foreach ($this as $key => $property) {
			$key = substr($key, 1);
			$props[$key] = $property;
		}
		
		return $props;
	}
}
?>