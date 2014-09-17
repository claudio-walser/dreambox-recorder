<?php
/**
 * setup the error reporting
 */
error_reporting(E_ALL);
ini_set('display_errors', true);

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


?>