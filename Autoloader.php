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
 * Just define your paths containing your classes
 *
 * @author		Claudio Walser
 */
final class Autoloader extends \Spaf\Core\Autoloader {

	/**
	 * lookup paths
	 */
	protected $_lookupPaths = array(
		'../../Spaf/src/',
		'../../'
	);

}
?>