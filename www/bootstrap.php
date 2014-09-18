<?php
/**
 * setup the error reporting
 */
error_reporting(E_ALL);
ini_set('display_errors', true);

/**
 * Procedural function for building http query
 */
function getCurrentLink(Array $params = array()) {
	$current = $_GET;
	// overwrite get with given params
	foreach ($params as $key => $value) {
		$current[$key] = $value;
	}
	
	return '?' . http_build_query($current);
}


/**
 * get the autoloader
 */
require_once('../Autoloader.php');
$autoloader = new DreamboxRecorder\Autoloader();

/**
 * registry objects to work with
 */
$registry = Spaf\Core\Registry::getInstance();
$registry->set('mysqli', new MySQLi('localhost', 'root', '', 'dreambox-recorder'), true);


$configFile = '../config/config.ini';

$config = \Spaf\Library\Config\Manager::factory($configFile);
$registry->set('config', $config, true);

?>