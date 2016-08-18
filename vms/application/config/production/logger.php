<?php
return array(
	'type' => 'database',
	
	'database' => array(
		'group' => 'account',
		'table' => 'gvs_log',
	),
	'custom' => array(
			'account_id' => Author::instance()->accountId(),
			'account_name' => Author::instance()->name(),
		)
);
