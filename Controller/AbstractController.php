<?php
namespace DreamboxRecorder\Controller;
/**
 * rename that abstraction stuff, dont like it anymore
 */
abstract class AbstractController extends \Spaf\Core\Controller\Abstraction {

	protected $_db = null;
	protected $_config = null;

	public function init() {
		$this->_db = $this->_registry->get('mysqli');
		$this->_config = $this->_registry->get('config');
	}

}
?>