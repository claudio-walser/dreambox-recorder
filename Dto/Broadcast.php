<?php
namespace DreamboxRecorder\Dto;

class Broadcast extends AbstractDto {
	
	protected $_id = 0;
	protected $_title = '';
	protected $_timeStart = '';
	protected $_timeEnd = '';
	protected $_isRecording = 0;
	protected $_isOver = false;

	public function setId($id) {
		$this->_id = (int) $id;
	}

	public function getId() {
		return $this->_id;
	}

	public function setTitle($title) {
		$this->_title = (string) $title;
	}

	public function getTitle() {
		return $this->_title;
	}

	public function setTimeStart($time) {
		$this->_timeStart = (int) $time;
	}

	public function getTimeStart() {
		return $this->_timeStart;
	}

	public function setTimeEnd($time) {
		$this->_timeEnd = (int) $time;
	}

	public function getTimeEnd() {
		return $this->_timeEnd;
	}

	public function setIsRecording($bool) {
		// convert to 0||1
		$this->_isRecording = (int)(bool) $bool;
	}

	public function getIsRecording() {
		return $this->_isRecording;
	}

	public function setIsOver($bool) {
		$this->_isOver = (int)(bool) $bool;
	}

	public function getIsOver() {
		return $this->_isOver;
	}
}

?>