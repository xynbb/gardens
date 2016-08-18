<?php defined('SYSPATH') OR die('No direct access allowed.');

return array
(
	'default' => array
	(
		'type'       => 'PDO',
		'connection' => array(
				'dsn'        => 'mysql:host=localhost;port=3306;dbname=test;charset=utf8',
				'username'   => 'root',
				'password'   => '',
				'persistent' => FALSE,
		),
		'table_prefix' => 'gvs_',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
	//账号
	'account' => array
	(
		'type'       => 'PDO',
		'connection' => array(
				'dsn'        => 'mysql:host=localhost;port=3306;dbname=test;charset=utf8',
				'username'   => 'root',
				'password'   => '',
				'persistent' => FALSE,
		),
		'table_prefix' => 'gvs_',
		'charset'      => 'utf8',
		'caching'      => FALSE,
	),
);