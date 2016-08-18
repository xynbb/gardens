CREATE TABLE `deader` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL DEFAULT '0' COMMENT '�ͻ�id',
  `tomb_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Ĺλid',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '��������',
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 δ֪ 1 Ů 2 ��',
  `dead_num` varchar(50) NOT NULL DEFAULT '' COMMENT '���߱��',
  `id_num` varchar(18) NOT NULL DEFAULT '' COMMENT '���֤��',
  `relation` varchar(50) NOT NULL DEFAULT '' COMMENT '�빺���˹�ϵ',
  `birth_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '��������',
  `die_date` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '��������',
  `note` text NOT NULL COMMENT '��ע',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1 ɾ��  1����',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='���߱�';

CREATE TABLE `customer` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����id',
  `tomb_id` int(11) NOT NULL DEFAULT '0' COMMENT 'Ĺλid',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '�ͻ�����',
  `sex` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0 ���� 1 Ů 2 ��',
  `cus_num` varchar(50) NOT NULL DEFAULT '' COMMENT '�ͻ����',
  `visiting_time` int(10) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  `tel` varchar(11) NOT NULL DEFAULT '' COMMENT '�ֻ���',
  `id_num` varchar(18) NOT NULL DEFAULT '' COMMENT '���֤��',
  `addess` varchar(255) NOT NULL DEFAULT '' COMMENT '��ϵ��ַ',
  `telephone` varchar(15) NOT NULL DEFAULT '' COMMENT '�̶��绰',
  `visit_num` tinyint(4) NOT NULL DEFAULT '0' COMMENT '��������',
  `source` tinyint(4) NOT NULL DEFAULT '0' COMMENT '�ͻ���Դ',
  `talk` text NOT NULL COMMENT 'Ǣ̸��¼',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1 ɾ�� 1 ����',
  `note` text NOT NULL COMMENT '��ע',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='�ͻ���';

CREATE TABLE `bury` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����id',
  `name` varchar(50) NOT NULL DEFAULT '' COMMENT '����',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1 ɾ�� 1 ����',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  `note` text NOT NULL COMMENT '��ע',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='���᷽ʽ';

CREATE TABLE `notices` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����id',
  `title` varchar(150) NOT NULL DEFAULT '' COMMENT '����',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '�Ǽ�ʱ��',
  `put_name` varchar(100) NOT NULL DEFAULT '' COMMENT '������',
  `put_id` int(11) NOT NULL DEFAULT '0' COMMENT '������id',
  `accept_name` varchar(100) NOT NULL DEFAULT '' COMMENT '����������',
  `acept_id` int(11) NOT NULL DEFAULT '-1' COMMENT '-1 ������ ',
  `content` text NOT NULL COMMENT '����',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='֪ͨ����';

CREATE TABLE `rbac_position` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '����id',
  `name` varchar(100) NOT NULL DEFAULT '' COMMENT 'ְλ����',
  `garden_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '������԰id',
  `garden_name` varchar(100) DEFAULT '' COMMENT '������԰����',
  `branch_id` tinyint(2) NOT NULL DEFAULT '0' COMMENT '��������id',
  `is_del` tinyint(1) NOT NULL DEFAULT '1' COMMENT '-1 ɾ�� 1 ����',
  `sort` int(11) NOT NULL DEFAULT '0' COMMENT '����',
  `create_time` int(10) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  `update_time` int(10) NOT NULL DEFAULT '0' COMMENT '����ʱ��',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='ְλ��';

