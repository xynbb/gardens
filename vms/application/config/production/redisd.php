<?php

return array(
    'video' => array(
	'type' => 'cluster',
	'redis' => array(

	),
	'cluster' => array(
	    'bj02-ops-rdsc01.pro.gomeplus.com:7001',
	    'bj02-ops-rdsc02.pro.gomeplus.com:7001',
	    'bj02-ops-rdsc03.pro.gomeplus.com:7001',
	)
    ),
    'main_m3u8' => array(
	'type' => 'cluster',
	'redis' => array(

	),
	'cluster' => array(
	    'bj02-ops-rdsc01.pro.gomeplus.com:7002',
	    'bj02-ops-rdsc02.pro.gomeplus.com:7002',
	    'bj02-ops-rdsc03.pro.gomeplus.com:7002',
	)
    ),
    'sub_m3u8' => array(
	'type' => 'cluster',
	'redis' => array(

	),
	'cluster' => array(
	    'bj02-ops-rdsc01.pro.gomeplus.com:7003',
	    'bj02-ops-rdsc02.pro.gomeplus.com:7003',
	    'bj02-ops-rdsc03.pro.gomeplus.com:7003',
	)
    ),
    'count' => array(
	'type' => 'cluster',
	'redis' => array(

	),
	'cluster' => array(
	    'bj02-ops-rdsc01.pro.gomeplus.com:7004',
	    'bj02-ops-rdsc02.pro.gomeplus.com:7004',
	    'bj02-ops-rdsc03.pro.gomeplus.com:7004',
	)
    ),
    'video_details' => array(
	'type' => 'cluster',
	'redis' => array(

	),
	'cluster' => array(
	    'bj02-ops-g1rdsc01.pro.gomeplus.com:7005',
	    'bj02-ops-g1rdsc02.pro.gomeplus.com:7005',
	    'bj02-ops-g1rdsc03.pro.gomeplus.com:7005',
	)
    )
);
