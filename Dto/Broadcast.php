<?php
/**
 * Todo: generate in orm maybe? Implement ACL for json clients here maybe?
 * Same controller returns different dto's containg more or less data, depending on the client
 * acl could be defined in xml where database is described... Just thinking and try to dont forget soon...
 */
namespace DreamboxRecorder\Dto;

class Broadcast {
	
	private $_id = 0;
	private $_title = '';
	private $_subtitle = '';
	private $_link = '';
	private $_startTime = '';
	private $_endTime = '';

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

	public function setTitle($title) {
		$this->_title = (string) $title;
	}

	public function getTitle() {
		return $this->_title;
	}

	public function setSubTitle($subtitle) {
		$this->_subtitle = (string) $subtitle;
		}

	public function getSubTitle() {
		return $this->_subtitle;
	}

	public function setLink($link) {
		if (substr($link, 0, 7) !== 'http://') {
			$link = 'http://' . $link;
		}
		$this->_link = (string) $link;
	}

	public function getLink() {
		return $this->_link;
	}

	public function setStartTime($time) {
		$this->_startTime = $time;
	}

	public function getStartTime() {
		return $this->_startTime;
	}

	public function setEndTime($time) {
		$this->_endTime = $time;
	}

	public function getEndTime() {
		return $this->_endTime;
	}
}

?>