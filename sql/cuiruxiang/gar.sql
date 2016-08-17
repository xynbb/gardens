CREATE TABLE `deader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0' COMMENT '客户id',
  `tomb_id` int(11) NOT NULL DEFAULT '0' COMMENT '墓位id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '逝者名称',
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 未知 1 女 2 男',
  `dead_num` varchar(50) NOT NULL DEFAULT '' COMMENT '逝者编号',
  `id_num` varchar(18) NOT NULL DEFAULT '' COMMENT '身份证号',
  `relation` varchar(50) NOT NULL DEFAULT '' COMMENT '与购买人关系',
  `birth_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '出生日期',
  `die_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '死亡日期',
  `note` text NOT NULL COMMENT '备注',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1 删除  1正常',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='逝者表';



CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `tomb_id` int(11) NOT NULL DEFAULT '0' COMMENT '墓位id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '客户姓名',
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 保密 1 女 2 男',
  `cus_num` varchar(50) NOT NULL DEFAULT '' COMMENT '客户编号',
  `visiting_time` int(10) NOT NULL DEFAULT '0' COMMENT '来访时间',
  `tel` varchar(11) NOT NULL DEFAULT '' COMMENT '手机号',
  `id_num` varchar(18) NOT NULL DEFAULT '' COMMENT '身份证号',
  `addess` varchar(255) NOT NULL DEFAULT '' COMMENT '联系地址',
  `telephone` varchar(15) NOT NULL DEFAULT '' COMMENT '固定电话',
  `visit_num` tinyint(4) NOT NULL DEFAULT '0' COMMENT '来访人数',
  `source` tinyint(4) NOT NULL DEFAULT '0' COMMENT '客户来源',
  `talk` text NOT NULL COMMENT '洽谈记录',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1 删除 1 正常',
  `note` text NOT NULL COMMENT '备注',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='客户表';


