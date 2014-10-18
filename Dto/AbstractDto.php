<?php
namespace DreamboxRecorder\Dto;

class AbstractDto extends \StdClass implements \JsonSerializable {
	
	public function __call($methodName, $arguments) {
		// only get and set methods, i dont care
		$keyName = lcfirst(substr($methodName, 3, strlen($methodName)));
		$method = strtolower(substr($methodName, 0, 3));
		
		switch ($method) {
			case 'set':
				if (is_array($arguments) && !empty($arguments[0])) {
					$value = is_numeric($arguments[0]) ? (int) $arguments[0] : (string) $arguments[0];
					$this->{$keyName} = $value;
				}
				return true;
				break; //know i dont need it, just to dont violate switch/case

			case 'get':
				if (!isset($this->{$keyName})) {
					throw new \Exception('You are trying to do something nasty - ' . $keyName . ' isnt set yet.');
				}
				return $this->{$keyName};
				break; //same

			default:

				throw new \Exception('A DataTransferObject usually only have get/set Methods or public properties, you tried to call ' . $methodName . ' method which does nothing.');
				break; // same
		}

	}

	public function __set($key, $value) {
		$this->$key = $value;
	}

	public function __get($key) {
		return isset($this->$key) ? $this->$key : null;
	}

	public function jsonSerialize() {
		return  $this->__toArray();
	}

	protected function __toArray() {
		$props = array();

		foreach ($this as $key => $property) {
			$props[$key] = $property;
		}
		
		return $props;
	}
}
?>