<?php
/**
 * $ID$
 *
 * Autoloader.php test
 */

namespace DreamboxRecorder;

// load Spaf\Autoloader, YOU HAVE TO
require_once('../../Spaf/src/Spaf/Core/Autoloader.php');
 
/**
 * Autoloader class
 * For new packages/libraries, just define your own autoloader method
 * and add it to Autoloader::register().
 *
 * @author		Claudio Walser
 */
final class Autoloader extends \Spaf\Core\Autoloader {

	/**
	 * Todo: Make this simpler, for example, just define lookup paths
	 */
	protected $_lookupPaths = array(
		'../../Spaf/src/',
		'../../'
	);

}
?>