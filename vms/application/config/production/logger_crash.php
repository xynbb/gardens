<?php
return array
(
		'custom' => array
		(
				'type'       => 'PDO',
				'connection' => array(
						'dsn'        => 'mysql:host=127.0.0.1;port=3306;dbname=kohana;charset=utf8',
						'username'   => 'root',
						'password'   => '',
						'persistent' => FALSE,
				),
				'charset'      => 'utf8',
				'table'        => 'gvs_log_crash'
		),
);