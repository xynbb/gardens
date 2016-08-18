<?php

return array(
    'video' => array(
	'type' => 'cluster',
	'redis' => array(
//	    'host' => '10.125.2.61',
//	    'port' => '6579',
//	    'persistent' => FALSE,
//	    'password' => NULL,
//	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj01-ops-rdsc05.pro.gomeplus.com:7001',
	    'bj01-ops-rdsc06.pro.gomeplus.com:7001',
	    'bj01-ops-rdsc04.pro.gomeplus.com:7001',
	)
    ),
    'main_m3u8' => array(
	'type' => 'cluster',
	'redis' => array(
//	    'host' => '10.125.2.61',
//	    'port' => '6579',
//	    'persistent' => FALSE,
//	    'password' => NULL,
//	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj01-ops-rdsc04.pro.gomeplus.com:7002',
	    'bj01-ops-rdsc05.pro.gomeplus.com:7002',
	    'bj01-ops-rdsc06.pro.gomeplus.com:7002',
	)
    ),
    'sub_m3u8' => array(
	'type' => 'cluster',
	'redis' => array(
//	    'host' => '10.125.2.61',
//	    'port' => '6579',
//	    'persistent' => FALSE,
//	    'password' => NULL,
//	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj01-ops-rdsc06.pro.gomeplus.com:7003',
	    'bj01-ops-rdsc05.pro.gomeplus.com:7003',
	    'bj01-ops-rdsc04.pro.gomeplus.com:7003',
	)
    ),
    'count' => array(
	'type' => 'cluster',
	'redis' => array(
//	    'host' => '10.125.2.61',
//	    'port' => '6579',
//	    'persistent' => FALSE,
//	    'password' => NULL,
//	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj01-ops-rdsc04.pro.gomeplus.com:7004',
	    'bj01-ops-rdsc05.pro.gomeplus.com:7004',
	    'bj01-ops-rdsc06.pro.gomeplus.com:7004',
	)
    ),
    'video_details' => array(
	'type' => 'cluster',
	'redis' => array(
//	    'host' => '10.125.2.61',
//	    'port' => '6579',
//	    'persistent' => FALSE,
//	    'password' => NULL,
//	    'timeout' => 3000,
	),
	'cluster' => array(
	    'bj02-ops-g1rdsc01.pro.gomeplus.com:7005',
	    'bj02-ops-g1rdsc02.pro.gomeplus.com:7005',
	    'bj02-ops-g1rdsc03.pro.gomeplus.com:7005',
	)
    )
);
