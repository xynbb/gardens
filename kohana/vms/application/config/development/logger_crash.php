<?php
return array
(
	'custom' => array
	(
		'type'       => 'PDO',
		'connection' => array(
				'dsn'        => 'mysql:host=localhost;port=3306;dbname=test;charset=utf8',
				'username'   => 'root',
				'password'   => '',
				'persistent' => FALSE,
		),
		'charset'      => 'utf8',
		'table'        => 'gvs_log_crash'
	),
); 