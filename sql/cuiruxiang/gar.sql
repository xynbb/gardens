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

CREATE TABLE `bury` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '名称',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1 删除 1 正常',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `note` text NOT NULL COMMENT '备注',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='安葬方式';

CREATE TABLE `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '标题',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '登记时间',
  `put_name` varchar(100) NOT NULL DEFAULT '' COMMENT '发布人',
  `put_id` int(11) NOT NULL DEFAULT '0' COMMENT '发布人id',
  `accept_name` varchar(100) NOT NULL DEFAULT '' COMMENT '接收人名称',
  `acept_id` int(11) NOT NULL DEFAULT '-1' COMMENT '-1 所有人 ',
  `content` text NOT NULL COMMENT '内容',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='通知公告';

CREATE TABLE `rbac_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT '职位名称',
  `garden_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '所属陵园id',
  `garden_name` varchar(100) DEFAULT '' COMMENT '所属陵园名称',
  `branch_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '所属部门id',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1 删除 1 正常',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '排序',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='职位表';

