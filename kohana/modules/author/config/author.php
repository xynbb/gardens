<?php
return array(
	'passport' => 'gvspassport',
	'lander' => 'database',
	'key' => ')&GY*^#<)(2O^#ME',
	'cipher' => MCRYPT_RIJNDAEL_128,
	'mode'   => MCRYPT_MODE_NOFB,
	
	'ldap' => array(
		'server' => '127.0.0.1',
		'port' => '3306',
		'baseDN' => 'ou=lingyuan,dc=lingyuan,dc=com', //DC (Domain Component) CN (Common Name) OU (Organizational Unit)
		'bindRDN' => '',
		'password' => '',
		'suffix' => '@lingyuan.com'
	),
		
	'database' => array(
		'group' => 'default',
	),
		
	'redis' => array(
		'server' => '127.0.0.1',
		'port' => '6379',
		'timeout' => 30,
		'persistent' => FALSE,
		'password' => 'foobared',
	),
);