
<?php
require 'environment.php';

global $config;
global $db;

$config = array();
if(ENVIRONMENT == 'development') {
	define("BASE_URL", "http://imobiliariasolelua.com.br/painel/");
	$config['dbname'] = 'imobsolelua_db';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'imobsolelua_admin';
	$config['dbpass'] = 'P@ssw0rd90';
} else {
	define("BASE_URL", "http://localhost/imob-sgi/painel/");
	$config['dbname'] = 'imobsolelua_db';
	$config['host'] = 'localhost';
	$config['dbuser'] = 'root';
	$config['dbpass'] = '';
}

$db = new PDO("mysql:dbname=".$config['dbname'].";host=".$config['host'].";charset=UTF8", $config['dbuser'], $config['dbpass']);
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);