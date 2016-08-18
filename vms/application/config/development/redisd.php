<?php

return array(
    'video' => array(
	'type' => 'cluster',
	'redis' => array(
	    'host' => '10.125.2.61',
	    'port' => '6579',
	    'persistent' => FALSE,
	    'password' => NULL,
	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj05-ops-rdsc01.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc02.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc03.dev.gomeplus.com:8002',
	)
    ),
    'main_m3u8' => array(
	'type' => 'cluster',
	'redis' => array(
	    'host' => '10.125.2.61',
	    'port' => '6579',
	    'persistent' => FALSE,
	    'password' => NULL,
	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj05-ops-rdsc01.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc02.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc03.dev.gomeplus.com:8002',
	)
    ),
    'sub_m3u8' => array(
	'type' => 'cluster',
	'redis' => array(
	    'host' => '10.125.2.61',
	    'port' => '6579',
	    'persistent' => FALSE,
	    'password' => NULL,
	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj05-ops-rdsc01.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc02.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc03.dev.gomeplus.com:8002',
	)
    ),
    'count' => array(
	'type' => 'cluster',
	'redis' => array(
	    'host' => '10.125.2.61',
	    'port' => '6579',
	    'persistent' => FALSE,
	    'password' => NULL,
	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj05-ops-rdsc01.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc02.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc03.dev.gomeplus.com:8002',
	)
    ),
    'video_details' => array(
	'type' => 'cluster',
	'redis' => array(
	    'host' => '10.125.2.61',
	    'port' => '6579',
	    'persistent' => FALSE,
	    'password' => NULL,
	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj05-ops-rdsc01.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc02.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc03.dev.gomeplus.com:8002',
	)
    ),
    //直播redis
    'live' => array(
	'type' => 'cluster',
	'redis' => array(
	    'host' => '10.125.2.61',
	    'port' => '6579',
	    'persistent' => FALSE,
	    'password' => NULL,
	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj05-ops-rdsc01.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc02.dev.gomeplus.com:8002',
	    'bj05-ops-rdsc03.dev.gomeplus.com:8002',
	)
    ),
);
