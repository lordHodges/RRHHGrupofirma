<?php
defined('BASEPATH') OR exit('No direct script access allowed');




$active_group = 'default';
$query_builder = TRUE;



// DEVELOPER
$db['default'] = array(
	'dsn'	=> '',
<<<<<<< HEAD
	'hostname' => 'localhost',
=======
	'hostname' => '10.10.11.240',
>>>>>>> 6d452e33e03ff9b08367071c515f6627be833f1a
	'username' => 'root',
	'password' => 'almendra',
	'database' => 'fa_rrhh',
	'dbdriver' => 'mysqli',
	'dbprefix' => '',
	'pconnect' => FALSE,
	// 'db_debug' => (ENVIRONMENT !== 'production'),
	'db_debug' => FALSE,
	'cache_on' => FALSE,
	'cachedir' => '',
	'char_set' => 'utf8',
	'dbcollat' => 'utf8_general_ci',
	'swap_pre' => '',
	'encrypt' => FALSE,
	'compress' => FALSE,
	'stricton' => FALSE,
	'failover' => array(),
	'save_queries' => TRUE
);
