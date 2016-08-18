<?php
return  array(
	'log_keep_days' => '-7',
	'execute_time' => 3,
	'segment_time' => 30,
	'group' => array(
		'default' => array(
			'default' => '默认'
			),
		'gvs' => array(
			'gvs' => 'Gvs',
			'crontab' => 'Crontab',
			'wmq' => 'Wmq',
			'sphinx' => 'Sphinx',
			'extranet' => '外网接口',
			'intranet' => '内网接口'
			),
		'convert' => array(
			'storage' => 'NAS',
			'rtmp' => 'RTMP',
			'live' => '直播转码',
			'demand' => '点播转码'
			),
		'player' => array(
			'develop' => '开发'
			)
		),
	'service' => array(
		'default' => '默认',
		'convert' => '视频转码',
		'player' => '视频播放器',
		'gvs' => '视频管理系统'
		)
	);
?>