<?php
namespace DreamboxRecorder\Dto;

class Broadcast extends AbstractDto {
	
	protected $id = 0;
	protected $channel = '';
	protected $title = '';
	protected $timeStart = '';
	protected $timeEnd = '';
	protected $isRecording = 0;
	protected $isOver = false;
	protected $outfile = '';

}

?>