/*
 Navicat Premium Data Transfer

 Source Server         : 101.201.102.102
 Source Server Type    : MySQL
 Source Server Version : 50626
 Source Host           : 101.201.102.102
 Source Database       : site_settings

 Target Server Type    : MySQL
 Target Server Version : 50626
 File Encoding         : utf-8

 Date: 08/14/2016 16:21:25 PM
*/

SET NAMES utf8;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
--  Table structure for `rbac_branch`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_branch`;
CREATE TABLE `rbac_branch` (
  `id` smallint(3) NOT NULL AUTO_INCREMENT COMMENT '部门编号',
  `name` varchar(50) NOT NULL,
  `parent_id` smallint(3) NOT NULL DEFAULT '0' COMMENT '父级编号',
  `path` varchar(25) NOT NULL COMMENT '路径',
  `description` text NOT NULL,
  `tap` int(1) unsigned NOT NULL DEFAULT '0' COMMENT '后台类型   0 BD后台  1 运营后台',
  `create_id` int(11) NOT NULL DEFAULT '0' COMMENT '用户编号',
  `update_id` int(11) NOT NULL COMMENT '修改时间',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '修改时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态 0删除 1启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COMMENT='部门表';

-- ----------------------------
--  Table structure for `rbac_menu`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_menu`;
CREATE TABLE `rbac_menu` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(255) COLLATE utf8_unicode_ci NOT NULL COMMENT '名称',
  `path` varchar(100) COLLATE utf8_unicode_ci NOT NULL COMMENT '路径',
  `parent_id` smallint(5) NOT NULL COMMENT '父级编号',
  `url` varchar(1000) COLLATE utf8_unicode_ci DEFAULT NULL,
  `modules` varchar(20) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '模块',
  `controller` varchar(20) COLLATE utf8_unicode_ci NOT NULL COMMENT '控制器',
  `actions` text COLLATE utf8_unicode_ci NOT NULL COMMENT '操作',
  `query_string` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '查询字符串',
  `is_show` tinyint(1) NOT NULL COMMENT '是否显示',
  `sort` smallint(5) NOT NULL COMMENT '排序',
  `img` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '',
  `class` varchar(50) COLLATE utf8_unicode_ci NOT NULL COMMENT '样式类',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `create_id` int(11) NOT NULL COMMENT '创建人',
  `update_id` int(11) NOT NULL DEFAULT '0',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime DEFAULT NULL COMMENT '修改时间',
  `tap` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL,
  `status` tinyint(1) NOT NULL COMMENT '状态（0禁用，1开启）',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_id` (`id`),
  KEY `spis` (`status`,`path`,`id`,`sort`),
  KEY `sort` (`sort`)
) ENGINE=InnoDB AUTO_INCREMENT=46 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='菜单表';

-- ----------------------------
--  Records of `rbac_menu`
-- ----------------------------
BEGIN;
INSERT INTO `rbac_menu` VALUES ('1', '系统设置', '0,1,', '0', '', '', '', '', '', '1', '6', '/images/icon06.png', '', '', '1', '1', '2015-03-27 13:39:35', '2016-02-29 10:26:16', '3', '1'), ('2', '菜单设置', '0,1,2,', '1', '', '', 'menu', '[{\"zh_name\":\"\\u83dc\\u5355\\u7ba1\\u7406\",\"controller\":\"\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u6dfb\\u52a0\\u83dc\\u5355\",\"controller\":\"\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u4fee\\u6539\\u83dc\\u5355\",\"controller\":\"\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5220\\u9664\\u83dc\\u5355\",\"controller\":\"\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2015-03-27 13:46:41', '2015-04-20 06:11:42', '3', '1'), ('3', '角色设置', '0,1,3,', '1', '', '', 'role', '[{\"zh_name\":\"\\u89d2\\u8272\\u7ba1\\u7406\",\"controller\":\"\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u89d2\\u8272\\u6dfb\\u52a0\",\"controller\":\"\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u89d2\\u8272\\u4fee\\u6539\",\"controller\":\"\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u89d2\\u8272\\u5220\\u9664\",\"controller\":\"\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u8bbe\\u7f6e\\u6743\\u9650\",\"controller\":\"\",\"action\":\"set_priv\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u8bbe\\u7f6e\\u89d2\\u8272\",\"controller\":\"\",\"action\":\"set_role\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2015-03-27 14:06:45', '2015-10-15 12:01:10', '3', '1'), ('4', '用户管理', '0,1,4,', '1', '', '', 'rbac_user', '[{\"zh_name\":\"\\u7528\\u6237\\u7ba1\\u7406\",\"controller\":\"\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u6dfb\\u52a0\\u7528\\u6237\",\"controller\":\"\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u5220\\u9664\\u7528\\u6237\",\"controller\":\"\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u8bbe\\u7f6e\\u89d2\\u8272\",\"controller\":\"role\",\"action\":\"set_role\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u4fee\\u6539\\u7528\\u6237\",\"controller\":\"\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u91cd\\u7f6e\\u5bc6\\u7801\",\"controller\":\"\",\"action\":\"newpassword\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2015-03-30 10:10:47', '2016-02-29 14:45:38', '3', '1'), ('31', '消息系统', '0,31,', '0', '', '', '', '', '', '1', '2', 'images/comment.png', '', '', '1', '0', '2016-02-18 14:37:40', null, null, '1'), ('32', '网站系统', '0,32,', '0', '', '', '', '', '', '1', '1', '/images/icon01.png', '', '', '1', '1', '2016-02-18 14:38:18', '2016-03-25 11:04:01', null, '1'), ('33', '合同系统', '0,33,', '0', '', '', '', '', '', '1', '3', '/images/icon04.png', '', '', '1', '1', '2016-02-18 14:39:21', '2016-02-29 10:27:08', null, '1'), ('34', '日志系统', '0,34,', '0', '', '', '', '', '', '1', '4', 'images/icon16.png', '', '', '1', '0', '2016-02-18 14:40:00', null, null, '1'), ('35', '首页管理', '0,32,35,', '32', '', '', 'front', '[{\"zh_name\":\"\\u7126\\u70b9\\u56fe\\u7ba1\\u7406\",\"controller\":\"focus\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u7126\\u70b9\\u56fe\\u6dfb\\u52a0\",\"controller\":\"focus\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u7126\\u70b9\\u56fe\\u4fee\\u6539\",\"controller\":\"focus\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u7126\\u70b9\\u56fe\\u5220\\u9664\",\"controller\":\"focus\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u6587\\u7ae0\\u5206\\u7c7b\\u7ba1\\u7406\",\"controller\":\"category\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u6587\\u7ae0\\u5206\\u7c7b\\u589e\\u52a0\",\"controller\":\"category\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u6587\\u7ae0\\u5206\\u7c7b\\u4fee\\u6539\",\"controller\":\"category\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u6587\\u7ae0\\u5206\\u7c7b\\u5220\\u9664\",\"controller\":\"category\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u884c\\u4e1a\\u8d44\\u8baf\\u7ba1\\u7406\",\"controller\":\"news\",\"action\":\"infor\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5a92\\u4f53\\u62a5\\u9053\\u7ba1\\u7406\",\"controller\":\"news\",\"action\":\"news\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5e2e\\u52a9\\u7ba1\\u7406\",\"controller\":\"news\",\"action\":\"help\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u516c\\u544a\\u7ba1\\u7406\",\"controller\":\"news\",\"action\":\"notice\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u65b0\\u95fb\\u6dfb\\u52a0\",\"controller\":\"news\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u65b0\\u95fb\\u4fee\\u6539\",\"controller\":\"news\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u65b0\\u95fb\\u5220\\u9664\",\"controller\":\"news\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5408\\u4f5c\\u4f19\\u4f34\\u7ba1\\u7406\",\"controller\":\"friendlink\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5408\\u4f5c\\u4f19\\u4f34\\u6dfb\\u52a0\",\"controller\":\"friendlink\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5408\\u4f5c\\u4f19\\u4f34\\u66f4\\u65b0\",\"controller\":\"friendlink\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5408\\u4f5c\\u4f19\\u4f34\\u5220\\u9664\",\"controller\":\"friendlink\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5bc6\\u4fdd\\u95ee\\u9898\\u7ba1\\u7406\",\"controller\":\"security\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5bc6\\u4fdd\\u95ee\\u9898\\u589e\\u52a0\",\"controller\":\"security\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5bc6\\u4fdd\\u95ee\\u9898\\u4fee\\u6539\",\"controller\":\"security\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5bc6\\u4fdd\\u95ee\\u9898\\u5220\\u9664\",\"controller\":\"security\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u7f51\\u7ad9\\u788e\\u7247\\u7ba1\\u7406\",\"controller\":\"webtrivia\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u7f51\\u7ad9\\u788e\\u7247\\u589e\\u52a0\",\"controller\":\"webtrivia\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u7f51\\u7ad9\\u788e\\u7247\\u4fee\\u6539\",\"controller\":\"webtrivia\",\"action\":\"edit\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u7f51\\u7ad9\\u788e\\u7247\\u5220\\u9664\",\"controller\":\"webtrivia\",\"action\":\"delete\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"PC\\u8f6f\\u4ef6\\u4fe1\\u606f\\u7ba1\\u7406\",\"controller\":\"pc_soft\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"PC\\u8f6f\\u4ef6\\u6dfb\\u52a0\",\"controller\":\"pc_soft\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"APP\\u8f6f\\u4ef6\\u4fe1\\u606f\\u7ba1\\u7406\",\"controller\":\"app_soft\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"APP\\u8f6f\\u4ef6\\u4fe1\\u606f\\u6dfb\\u52a0\",\"controller\":\"app_soft\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"APP\\u4e8c\\u7ef4\\u7801\\u4e0b\\u8f7d\",\"controller\":\"app_soft\",\"action\":\"download\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5410\\u69fd\\u8d62\\u5927\\u5956\",\"controller\":\"suggest\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5410\\u69fd\\u8d62\\u5927\\u5956\\u4fe1\\u606f\",\"controller\":\"suggest\",\"action\":\"checkinfo\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u67e5\\u770b\\u5efa\\u8bae\\u8be6\\u60c5\",\"controller\":\"suggest\",\"action\":\"updsug\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u63a7\\u5236\\u4e3b\\u7ad9\\u4f1a\\u8bdd\\u65f6\\u95f4\",\"controller\":\"set_cookie\",\"action\":\"add_cookie_time\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u63a7\\u5236\\u4e3b\\u7ad9\\u7248\\u672c\\u53f7\",\"controller\":\"set_version\",\"action\":\"add_version\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2016-02-18 14:50:09', '2016-04-07 13:47:13', null, '1'), ('36', '合同管理', '0,33,36,', '33', '', '', 'contract', '[{\"zh_name\":\"\\u5408\\u540c\\u7c7b\\u578b\",\"controller\":\"\",\"action\":\"type\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u5408\\u540c\\u7c7b\\u578b\\u6dfb\\u52a0\",\"controller\":\"\",\"action\":\"type_add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5408\\u540c\\u7c7b\\u578b\\u4fee\\u6539\",\"controller\":\"\",\"action\":\"type_upd\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5408\\u540c\\u7c7b\\u578b\\u5220\\u9664\",\"controller\":\"\",\"action\":\"type_del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5408\\u540c\\u6a21\\u677f\",\"controller\":\"\",\"action\":\"tpl\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u5408\\u540c\\u6a21\\u677f\\u5220\\u9664\",\"controller\":\"\",\"action\":\"tpl_del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5408\\u540c\\u6a21\\u677f\\u4fee\\u6539\",\"controller\":\"\",\"action\":\"tpl_edit\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"U\\u76fe\\u65e5\\u5fd7\",\"controller\":\"\",\"action\":\"ukeylog\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2016-02-18 14:58:15', '2016-02-29 15:03:49', null, '1'), ('37', '模板管理', '0,31,37,', '31', '', '', 'notice_template', '[{\"zh_name\":\"\\u6dfb\\u52a0\\u6a21\\u677f\",\"controller\":\"\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u6a21\\u677f\\u5217\\u8868\",\"controller\":\"\",\"action\":\"list\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u6a21\\u677f\\u4fee\\u6539\",\"controller\":\"\",\"action\":\"edit\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u6a21\\u677f\\u5220\\u9664\",\"controller\":\"\",\"action\":\"delete\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u6a21\\u677f\\u662f\\u5426\\u6709\\u6548\",\"controller\":\"\",\"action\":\"set_status\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2016-02-18 15:00:33', '2016-03-24 14:57:04', null, '1'), ('38', '开关管理', '0,31,38,', '31', '', '', 'notice_template', '[{\"zh_name\":\"\\u5f00\\u5173\\u8bbe\\u7f6e\",\"controller\":\"\",\"action\":\"notice_turn_set\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2016-02-18 15:01:21', '2016-02-19 17:04:02', null, '1'), ('39', '消息查询', '0,31,39,', '31', '', '', 'notice_template', '[{\"zh_name\":\"\\u77ed\\u4fe1\\u90ae\\u4ef6\\u67e5\\u8be2\",\"controller\":\"\",\"action\":\"clientlist\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2016-02-18 15:02:34', '2016-02-22 09:38:01', null, '1'), ('40', '日志管理', '0,34,40,', '34', '', '', 'apilog', '[{\"zh_name\":\"\\u767b\\u5f55\\u65e5\\u5fd7\",\"controller\":\"\",\"action\":\"loginlog\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u63a5\\u53e3\\u65e5\\u5fd7\",\"controller\":\"\",\"action\":\"lists\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u4ea4\\u6613\\u64cd\\u4f5c\\u65e5\\u5fd7\",\"controller\":\"\",\"action\":\"deallog\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u64cd\\u4f5c\\u65e5\\u5fd7\",\"controller\":\"\",\"action\":\"site_log\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2016-02-18 15:04:08', '2016-03-01 17:01:49', null, '1'), ('41', '保证金违约金设置', '0,32,41,', '32', '', '', 'goodscategory', '[{\"zh_name\":\"\\u4fdd\\u8bc1\\u91d1\\u8fdd\\u7ea6\\u91d1\\u8bbe\\u7f6e\",\"controller\":\"\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u4fdd\\u8bc1\\u91d1\\u6bd4\\u4f8b\\u8bbe\\u7f6e\",\"controller\":\"\",\"action\":\"update_margin\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u8fdd\\u7ea6\\u91d1\\u6bd4\\u4f8b\\u8bbe\\u7f6e\",\"controller\":\"\",\"action\":\"update_penalty\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2016-02-24 14:14:23', '2016-02-29 18:12:28', null, '1'), ('42', '上传规则设定', '0,32,42,', '32', '', '', 'upload_rules', '[{\"zh_name\":\"\\u4e0a\\u4f20\\u89c4\\u5219\\u5217\\u8868\",\"controller\":\"\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u4e0a\\u4f20\\u89c4\\u5219\\u6dfb\\u52a0\",\"controller\":\"\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u4e0a\\u4f20\\u89c4\\u5219\\u4fee\\u6539\",\"controller\":\"\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u4e0a\\u4f20\\u89c4\\u5219\\u5220\\u9664\",\"controller\":\"\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"}]', '', '1', '0', '/images/left_icon/ico01.png', '', '', '1', '1', '2016-03-03 14:42:57', '2016-03-30 18:51:54', null, '1'), ('43', '上传规则设定', '0,32,42,43,', '42', '', '', 'upload', '[{\"zh_name\":\"\\u4e0a\\u4f20\\u89c4\\u5219\\u5217\\u8868\",\"controller\":\"\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"tap\":0,\"is_show\":\"1\"},{\"zh_name\":\"\\u4e0a\\u4f20\\u89c4\\u5219\\u6dfb\\u52a0\",\"controller\":\"\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"tap\":0,\"is_show\":\"0\"},{\"zh_name\":\"\\u4e0a\\u4f20\\u89c4\\u5219\\u4fee\\u6539\",\"controller\":\"\",\"action\":\"update\",\"query_string\":\"\",\"url\":\"\",\"tap\":0,\"is_show\":\"0\"},{\"zh_name\":\"\\u4e0a\\u4f20\\u89c4\\u5219\\u5220\\u9664\",\"controller\":\"\",\"action\":\"del\",\"query_string\":\"\",\"url\":\"\",\"tap\":0,\"is_show\":\"0\"}]', '', '1', '0', '', '', '', '1', '0', '2016-03-03 14:44:57', null, null, '0'), ('44', '（贸易）分类控制', '0,32,44,', '32', '', '', 'configure', '[{\"zh_name\":\"\\u5206\\u7c7b\\u914d\\u7f6e\\u5217\\u8868\",\"controller\":\"\",\"action\":\"configurelist\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u5206\\u7c7b\\u914d\\u7f6e\\u6dfb\\u52a0\",\"controller\":\"\",\"action\":\"add\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5206\\u7c7b\\u914d\\u7f6e\\u4fee\\u6539\",\"controller\":\"\",\"action\":\"edit\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"},{\"zh_name\":\"\\u5206\\u7c7b\\u914d\\u7f6e\\u5220\\u9664\",\"controller\":\"\",\"action\":\"delete\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"}]', '', '1', '0', 'images/left_icon/ico01.png', '', '', '1', '1', '2016-03-03 16:38:29', '2016-03-24 15:00:44', null, '1'), ('45', '定向交易白名单', '0,32,45,', '32', '', '', 'whitelist', '[{\"zh_name\":\"\\u767d\\u540d\\u5355\\u5217\\u8868\",\"controller\":\"\",\"action\":\"index\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"1\"},{\"zh_name\":\"\\u767d\\u540d\\u5355\\u7f16\\u8f91\",\"controller\":\"\",\"action\":\"edit\",\"query_string\":\"\",\"url\":\"\",\"is_show\":\"0\"}]', '', '0', '0', 'images/left_icon/ico01.png', '', '', '1', '1', '2016-03-09 13:43:30', '2016-03-28 14:54:16', null, '1');
COMMIT;

-- ----------------------------
--  Table structure for `rbac_priv`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_priv`;
CREATE TABLE `rbac_priv` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `role_id` smallint(5) NOT NULL COMMENT '角色编号',
  `menu_id` smallint(5) NOT NULL COMMENT '菜单编号',
  `controller` varchar(25) COLLATE utf8_unicode_ci NOT NULL,
  `action` varchar(25) COLLATE utf8_unicode_ci NOT NULL COMMENT '操作',
  `create_id` int(11) NOT NULL COMMENT '操作账户',
  `update_id` int(11) NOT NULL DEFAULT '0' COMMENT '修改人',
  `create_time` datetime NOT NULL COMMENT '创建时间',
  `update_time` datetime NOT NULL COMMENT '修改时间',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '状态(0禁用,1正常)',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_id` (`id`),
  UNIQUE KEY `r_c_a_m` (`role_id`,`controller`,`action`,`menu_id`),
  KEY `status` (`status`)
) ENGINE=InnoDB AUTO_INCREMENT=284 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='权限信息表';

-- ----------------------------
--  Records of `rbac_priv`
-- ----------------------------
BEGIN;
INSERT INTO `rbac_priv` VALUES ('196', '8', '1', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('197', '8', '2', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('198', '8', '3', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('199', '8', '4', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('200', '8', '31', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('201', '8', '37', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('202', '8', '38', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('203', '8', '39', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('204', '8', '32', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('205', '8', '35', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('206', '8', '41', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('207', '8', '33', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('208', '8', '36', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('209', '8', '34', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('210', '8', '40', '', '', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('211', '8', '2', 'menu', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('212', '8', '2', 'menu', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('213', '8', '2', 'menu', 'update', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('214', '8', '2', 'menu', 'del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('215', '8', '3', 'role', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('216', '8', '3', 'role', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('217', '8', '3', 'role', 'update', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('218', '8', '3', 'role', 'del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('219', '8', '3', 'role', 'set_priv', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('220', '8', '3', 'role', 'set_role', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('221', '8', '4', 'rbac_user', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('222', '8', '4', 'rbac_user', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('223', '8', '4', 'rbac_user', 'del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('224', '8', '4', 'rbac_user', 'update', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('225', '8', '4', 'rbac_user', 'newpassword', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('226', '8', '4', 'role', 'set_role', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('227', '8', '37', 'notice_template', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('228', '8', '37', 'notice_template', 'list', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('229', '8', '37', 'notice_template', 'edit', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('230', '8', '37', 'notice_template', 'delete', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('231', '8', '38', 'notice_template', 'notice_turn_set', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('232', '8', '39', 'notice_template', 'clientlist', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('233', '8', '35', 'focus', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('234', '8', '35', 'focus', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('235', '8', '35', 'focus', 'update', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('236', '8', '35', 'focus', 'del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('237', '8', '35', 'category', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('238', '8', '35', 'category', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('239', '8', '35', 'category', 'update', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('240', '8', '35', 'category', 'del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('241', '8', '35', 'news', 'infor', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('242', '8', '35', 'news', 'news', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('243', '8', '35', 'news', 'help', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('244', '8', '35', 'news', 'notice', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('245', '8', '35', 'news', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('246', '8', '35', 'news', 'update', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('247', '8', '35', 'news', 'del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('248', '8', '35', 'friendlink', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('249', '8', '35', 'friendlink', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('250', '8', '35', 'friendlink', 'update', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('251', '8', '35', 'friendlink', 'del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('252', '8', '35', 'security', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('253', '8', '35', 'security', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('254', '8', '35', 'security', 'update', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('255', '8', '35', 'security', 'del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('256', '8', '35', 'webtrivia', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('257', '8', '35', 'webtrivia', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('258', '8', '35', 'webtrivia', 'edit', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('259', '8', '35', 'webtrivia', 'delete', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('260', '8', '35', 'pc_soft', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('261', '8', '35', 'pc_soft', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('262', '8', '35', 'app_soft', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('263', '8', '35', 'app_soft', 'add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('264', '8', '35', 'app_soft', 'download', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('265', '8', '35', 'suggest', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('266', '8', '35', 'suggest', 'checkinfo', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('267', '8', '35', 'suggest', 'updsug', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('268', '8', '41', 'goodscategory', 'index', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('269', '8', '41', 'goodscategory', 'update_margin', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('270', '8', '41', 'goodscategory', 'update_penalty', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('271', '8', '36', 'contract', 'type', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('272', '8', '36', 'contract', 'type_add', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('273', '8', '36', 'contract', 'type_upd', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('274', '8', '36', 'contract', 'type_del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('275', '8', '36', 'contract', 'tpl', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('276', '8', '36', 'contract', 'tpl_del', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('277', '8', '36', 'contract', 'tpl_edit', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('278', '8', '36', 'contract', 'ukeylog', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('279', '8', '40', 'apilog', 'loginlog', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('280', '8', '40', 'apilog', 'lists', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('281', '8', '40', 'apilog', 'operatelog', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '0'), ('282', '8', '40', 'apilog', 'deallog', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1'), ('283', '8', '40', 'apilog', 'query_log', '1', '1', '2016-02-29 15:23:39', '2016-02-29 17:12:25', '1');
COMMIT;

-- ----------------------------
--  Table structure for `rbac_role`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_role`;
CREATE TABLE `rbac_role` (
  `id` smallint(5) NOT NULL AUTO_INCREMENT COMMENT '编号',
  `name` varchar(30) COLLATE utf8_unicode_ci NOT NULL COMMENT '角色名称',
  `parent_id` smallint(5) NOT NULL COMMENT '父级编号',
  `path` varchar(500) COLLATE utf8_unicode_ci NOT NULL COMMENT '角色路径',
  `description` varchar(1000) COLLATE utf8_unicode_ci NOT NULL COMMENT '描述',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '创建时间',
  `update_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00' COMMENT '修改时间',
  `create_id` int(11) NOT NULL COMMENT '用户编号',
  `update_id` int(11) NOT NULL DEFAULT '0' COMMENT '修改编号',
  `status` tinyint(1) NOT NULL COMMENT '状态0禁用,1正常,2删除',
  `is_super` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否为超级管理员',
  PRIMARY KEY (`id`),
  UNIQUE KEY `UNIQUE_id` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci COMMENT='角色表';

-- ----------------------------
--  Records of `rbac_role`
-- ----------------------------
BEGIN;
INSERT INTO `rbac_role` VALUES ('1', '超级管理员', '0', '0,1,', '拥有所有权限', '2016-02-18 09:44:12', '2016-02-18 10:11:39', '1', '1', '1', '1'), ('8', '管理员', '1', '0,1,8,', '', '2016-02-18 10:58:27', '0000-00-00 00:00:00', '1', '0', '1', '0');
COMMIT;

-- ----------------------------
--  Table structure for `rbac_user`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_user`;
CREATE TABLE `rbac_user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `uname` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `headimg` varchar(255) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '头像',
  `passwd` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `real_name` varchar(64) COLLATE utf8_unicode_ci NOT NULL,
  `mobile` char(11) CHARACTER SET utf8 NOT NULL DEFAULT '',
  `sex` tinyint(2) unsigned NOT NULL DEFAULT '0' COMMENT '0 保密 1 女 2 男',
  `email` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '邮箱',
  `idcard` varchar(20) COLLATE utf8_unicode_ci NOT NULL DEFAULT '' COMMENT '身份证号',
  `deptname` varchar(255) COLLATE utf8_unicode_ci NOT NULL,
  `create_id` int(10) NOT NULL,
  `update_id` int(10) NOT NULL,
  `create_time` datetime NOT NULL,
  `update_time` datetime NOT NULL,
  `login_time` datetime NOT NULL,
  `error_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '登录错误时间',
  `error_num` smallint(5) NOT NULL DEFAULT '0' COMMENT '错误次数',
  `status` tinyint(1) NOT NULL DEFAULT '1' COMMENT '0删除 1启用 2禁用',
  PRIMARY KEY (`id`),
  UNIQUE KEY `uname_tap` (`uname`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
--  Records of `rbac_user`
-- ----------------------------
BEGIN;
INSERT INTO `rbac_user` VALUES ('1', 'admin', '/user/2015/12/08/439821c45c638762e1b5851ab795a98d.png', '96e79218965eb72c92a549dd5a330112', '超级管理员', '15531649491', '0', 'gvbbbn@chjnk.cuhbvcCB', '', '飞马大宗-前端php组', '0', '1', '0000-00-00 00:00:00', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '1'), ('2', 'zhangtao', '', 'e10adc3949ba59abbe56e057f20f883e', 'zhangtao', '', '0', '', '', '飞马大宗-前端php组', '0', '1', '0000-00-00 00:00:00', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '1'), ('3', 'wanggang', '', '96e79218965eb72c92a549dd5a330112', 'wanggang', '11111111111', '0', '42243@qq.com', '111111111111111111', '飞马大宗-php', '0', '3', '2015-08-24 14:25:26', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '1'), ('4', 'root', '', 'e10adc3949ba59abbe56e057f20f883e', '超级管理员', '', '0', '', '', '飞马大宗-php', '0', '4', '2015-09-15 10:14:56', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '1'), ('5', 'test', '', 'e10adc3949ba59abbe56e057f20f883e', '测试', '', '0', '', '', '测试-部门', '4', '4', '2015-09-18 16:44:26', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '1'), ('6', 'zhouwei', '', 'e10adc3949ba59abbe56e057f20f883e', '周玮', '18600000000', '0', 'wei.zhou@fmscm.com', '123456789012345678', 'test', '1', '6', '2015-10-08 16:28:04', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '1'), ('7', 'wanghongfeng', '', 'e10adc3949ba59abbe56e057f20f883e', '王洪峰', '18600367942', '0', '5179@qq.com', '133333333333333333', '飞马', '1', '1', '2015-10-10 16:48:17', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '1'), ('8', 'uname', '', 'e10adc3949ba59abbe56e057f20f883e', '测试', '15110191530', '0', '1510191530@163.com', '620302199812211519', 'test', '4', '4', '2015-10-15 17:59:39', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '2'), ('9', 'bd_jy', '', 'e10adc3949ba59abbe56e057f20f883e', '测试', '18611011015', '0', '1510191530@163.com', '620302199812211519', 'test', '4', '4', '2015-12-09 03:45:06', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '2'), ('10', '111', '', '8ddcff3a80f4189ca1c9d4d902c3c909', '111', '11111111111', '1', '111111', '111111111111111111', '1111', '1', '1', '2016-03-31 06:58:12', '2016-08-14 12:50:22', '2016-08-14 12:50:22', '0', '0', '1');
COMMIT;

-- ----------------------------
--  Table structure for `rbac_user_role`
-- ----------------------------
DROP TABLE IF EXISTS `rbac_user_role`;
CREATE TABLE `rbac_user_role` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL COMMENT '用户编号',
  `role_id` smallint(5) NOT NULL COMMENT '角色编号',
  `branch_id` smallint(5) NOT NULL DEFAULT '0' COMMENT '部门编号',
  `priv` text NOT NULL,
  `create_id` int(11) NOT NULL COMMENT '操作人',
  `update_id` int(11) NOT NULL DEFAULT '0' COMMENT '修改人',
  `create_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `update_time` datetime NOT NULL DEFAULT '0000-00-00 00:00:00',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0删除 1启用',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='用户角色关联表';

-- ----------------------------
--  Records of `rbac_user_role`
-- ----------------------------
BEGIN;
INSERT INTO `rbac_user_role` VALUES ('1', '1', '1', '0', '', '1', '1', '0000-00-00 00:00:00', '0000-00-00 00:00:00', '1'), ('3', '3', '8', '0', '', '1', '0', '2016-02-29 15:25:31', '2016-02-29 15:25:31', '1');
COMMIT;

SET FOREIGN_KEY_CHECKS = 1;
