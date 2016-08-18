/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50711
Source Host           : localhost:3306
Source Database       : test

Target Server Type    : MYSQL
Target Server Version : 50711
File Encoding         : 65001

Date: 2016-08-18 14:03:53
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for gvs_account
-- ----------------------------
DROP TABLE IF EXISTS `gvs_account`;
CREATE TABLE `gvs_account` (
  `account_id` bigint(20) NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `employee_id` bigint(20) NOT NULL DEFAULT '0' COMMENT '工号',
  `given_name` char(32) NOT NULL DEFAULT '' COMMENT '姓名',
  `name` char(20) NOT NULL DEFAULT '' COMMENT '用户名',
  `password` char(32) NOT NULL DEFAULT '' COMMENT '密码',
  `email` char(100) NOT NULL DEFAULT '' COMMENT '邮件',
  `phone` char(20) NOT NULL DEFAULT '' COMMENT '电话',
  `mobile` char(18) NOT NULL DEFAULT '' COMMENT '手机',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 －1删除 0默认',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`account_id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=InnoDB AUTO_INCREMENT=4908 DEFAULT CHARSET=utf8 COMMENT='用户信息表';

-- ----------------------------
-- Records of gvs_account
-- ----------------------------
INSERT INTO `gvs_account` VALUES ('1', '0', 'root', 'root', '96e79218965eb72c92a549dd5a330112', 'root@gomeplus.com', '15600356394', '', '0', '0', '1466234386');
INSERT INTO `gvs_account` VALUES ('4812', '0', '彭猛', 'pengmeng', '', 'pengmeng@gomeplus.com', '', '', '0', '1457424789', '1471407763');
INSERT INTO `gvs_account` VALUES ('4813', '0', '白珅', 'baishen', '', 'baishen@gomeplus.com', '', '', '0', '1457927338', '1469518047');
INSERT INTO `gvs_account` VALUES ('4815', '0', '测试2', 'ceshi2', 'd41d8cd98f00b204e9800998ecf8427e', 'abc@gomeplus.com', '', '111', '0', '1458032306', '1460532617');
INSERT INTO `gvs_account` VALUES ('4817', '0', '测试444', 'ab', 'd41d8cd98f00b204e9800998ecf8427e', '3323@gomeplus.com', '23323', '222', '0', '1458032530', '1460536242');
INSERT INTO `gvs_account` VALUES ('4819', '0', '测试1', 'ceshi12', 'd41d8cd98f00b204e9800998ecf8427e', 'ceshi1@gomeplus.com', '2133', '1111', '0', '1458032747', '1460535727');
INSERT INTO `gvs_account` VALUES ('4823', '0', '于士畯', 'yushijun', '', 'yushijun@gomeplus.com', '', '', '0', '1458111056', '1458111056');
INSERT INTO `gvs_account` VALUES ('4825', '0', '孙东杰', 'sundongjie', '', 'sundongjie@gomeplus.com', '', '', '0', '1458184287', '1468894722');
INSERT INTO `gvs_account` VALUES ('4827', '0', 'test1', 'test one', 'd41d8cd98f00b204e9800998ecf8427e', 'test@gomeplus.com', '', '', '0', '1458539891', '1458539891');
INSERT INTO `gvs_account` VALUES ('4831', '0', '耿洋洋', 'gengyangyang', '', 'gengyangyang@gomeplus.com', '0311-66809081', '18612314865', '0', '1458884894', '1471484525');
INSERT INTO `gvs_account` VALUES ('4833', '0', '张华东', 'zhanghuadong', '', 'zhanghuadong@gomeplus.com', '', '', '0', '1459217028', '1466574926');
INSERT INTO `gvs_account` VALUES ('4835', '0', '张邦雄', 'zhangbangxiong', '', 'zhangbangxiong@gomeplus.com', '', '', '0', '1459403766', '1471400450');
INSERT INTO `gvs_account` VALUES ('4837', '0', '', '4444', '96e79218965eb72c92a549dd5a330112', '2222', '22', '2222', '0', '1460535768', '1464661576');
INSERT INTO `gvs_account` VALUES ('4839', '0', '', '444445', '96e79218965eb72c92a549dd5a330112', '2222', '22', '2222', '0', '1460535780', '1464661564');
INSERT INTO `gvs_account` VALUES ('4841', '0', 'rr', '4444452', 'd41d8cd98f00b204e9800998ecf8427e', '2222', '22', '2222', '0', '1460535853', '1464661551');
INSERT INTO `gvs_account` VALUES ('4843', '0', '134', '134', 'd41d8cd98f00b204e9800998ecf8427e', '1', '1', '1', '0', '1460536268', '1460536268');
INSERT INTO `gvs_account` VALUES ('4845', '0', '45', '346', 'd41d8cd98f00b204e9800998ecf8427e', '3', '1', '3', '0', '1460536477', '1460688981');
INSERT INTO `gvs_account` VALUES ('4847', '0', 'fff', 'ff', 'd41d8cd98f00b204e9800998ecf8427e', 'ff', '1', '2', '0', '1460541239', '1464661527');
INSERT INTO `gvs_account` VALUES ('4849', '0', 'fffrr', 'ffrr', 'd41d8cd98f00b204e9800998ecf8427e', 'ff', '19', '2', '0', '1460541267', '1464661515');
INSERT INTO `gvs_account` VALUES ('4851', '0', 'ffffff2', 'ffffff2', 'd41d8cd98f00b204e9800998ecf8427e', 'ff2', '22', '12', '0', '1460544055', '1464661470');
INSERT INTO `gvs_account` VALUES ('4853', '0', '李仕颖', 'lishiying', '', 'lishiying@gomeplus.com', '', '', '0', '1460690802', '1463379090');
INSERT INTO `gvs_account` VALUES ('4855', '0', 'ceshi56', 'ceshi56', 'd41d8cd98f00b204e9800998ecf8427e', 'ff', '2', '1', '0', '1460692392', '1464661443');
INSERT INTO `gvs_account` VALUES ('4857', '0', '白露', 'bailu', '', 'bailu@gomeplus.com', '', '', '0', '1460701857', '1463379072');
INSERT INTO `gvs_account` VALUES ('4859', '0', '耿星', 'gengxing', '', 'gengxing@gomeplus.com', '', '', '0', '1461579778', '1471487604');
INSERT INTO `gvs_account` VALUES ('4861', '0', '怀达', 'huaida', '', 'huaida@gomeplus.com', '', '', '0', '1461580002', '1470626637');
INSERT INTO `gvs_account` VALUES ('4863', '0', '吴金', 'wujin', '', 'wujin@gomeplus.com', '', '', '0', '1461580024', '1470205447');
INSERT INTO `gvs_account` VALUES ('4865', '0', '黄永煌', 'huangyonghuang', '', 'huangyonghuang@gomeplus.com', '', '13718602381', '0', '1461580054', '1470284913');
INSERT INTO `gvs_account` VALUES ('4867', '0', '陈祥', 'chenxiang', '', 'chenxiang@gomeplus.com', '', '', '0', '1461917747', '1470300190');
INSERT INTO `gvs_account` VALUES ('4869', '0', '步杰峰', 'bujiefeng', '', 'bujiefeng@gomeplus.com', '', '', '0', '1462777301', '1468290204');
INSERT INTO `gvs_account` VALUES ('4871', '0', '杨秋兰', 'yangqiulan', '000373ccdcda19d617036cd8ed0d58bb', 'yangqiulan@gomeplus.com', '', '', '0', '1462786974', '1471336838');
INSERT INTO `gvs_account` VALUES ('4873', '0', '廉璐璐', 'lianlulu', '', 'lianlulu@gomeplus.com', '', '', '0', '1462946572', '1468218376');
INSERT INTO `gvs_account` VALUES ('4875', '0', 'lianlulu', 'lianlulu1', 'eeafb716f93fa090d7716749a6eefa72', 'lianlulu@gomeplus.com', '', '15311471706', '0', '1462954261', '1462954261');
INSERT INTO `gvs_account` VALUES ('4877', '0', '莫小霞', 'moxiaoxia', 'e10adc3949ba59abbe56e057f20f883e', '129086544@qq.com', '', '', '0', '1463036436', '1463036589');
INSERT INTO `gvs_account` VALUES ('4879', '0', 'gengyangyang', 'gengqianyu', 'e10adc3949ba59abbe56e057f20f883e', 'gengqianyu@gome.com', '0311-66809081', '18612314865', '0', '1463074305', '1463074305');
INSERT INTO `gvs_account` VALUES ('4881', '0', 'quanhengzhe1', 'quanhengzhe1', 'e10adc3949ba59abbe56e057f20f883e', 'quanhengzhe@gomeplus.com', '', '', '-1', '1463134496', '1463134496');
INSERT INTO `gvs_account` VALUES ('4883', '0', 'quanhengzhe12', 'quanhengzhe12', '202cb962ac59075b964b07152d234b70', '123', '123123', '123123123', '-1', '1463393775', '1463393775');
INSERT INTO `gvs_account` VALUES ('4885', '0', 'qhz', 'qhz', 'e10adc3949ba59abbe56e057f20f883e', 'qhz@gomeplus.com', 'asdfasdfasdf', '12345678901', '-1', '1463394059', '1463394059');
INSERT INTO `gvs_account` VALUES ('4886', '0', '', '@#测试浏览器显示@！*', 'c4ca4238a0b923820dcc509a6f75849b', 'gome@123.com', '', '', '0', '1463636092', '1463636092');
INSERT INTO `gvs_account` VALUES ('4887', '0', '啊三翻四复222', '123123', '202cb962ac59075b964b07152d234b70', '12312323', '123123', '131233', '0', '1463716683', '1466596290');
INSERT INTO `gvs_account` VALUES ('4888', '0', '熊仁海', 'xiongrenhai', '536455409fbcec72ef22535f115a8eb2', 'xiongrenhai@gomeplus.com', '', '', '0', '1464146787', '1471440892');
INSERT INTO `gvs_account` VALUES ('4889', '0', '张世杰', 'zhangshijie', '', 'zhangshijie@gomeplus.com', '', '', '0', '1465351453', '1471245515');
INSERT INTO `gvs_account` VALUES ('4890', '0', '杨红波', 'yanghongbo', '', 'yanghongbo@gomeplus.com', '', '', '0', '1465373360', '1465810774');
INSERT INTO `gvs_account` VALUES ('4891', '0', '全亨哲', 'quanhengzhe', 'bdbadefe1ae01bdd7d7c45035951dfb8', 'quanhengzhe@gomeplus.com', '18401213570', '18401213570', '0', '1465798230', '1471485350');
INSERT INTO `gvs_account` VALUES ('4892', '0', '测1', '123', '202cb962ac59075b964b07152d234b70', '123', '123', '123', '-1', '1465798915', '1466751766');
INSERT INTO `gvs_account` VALUES ('4893', '0', '祁长春', 'qichangchun', '', 'qichangchun@gomeplus.com', '', '', '0', '1466489372', '1471486637');
INSERT INTO `gvs_account` VALUES ('4894', '0', '莫日根', 'morigen', '', 'morigen@gomeplus.com', '', '', '0', '1466495649', '1467091908');
INSERT INTO `gvs_account` VALUES ('4895', '0', '罗倩', 'luoqian', '', 'luoqian@gomeplus.com', '', '', '0', '1466495938', '1470626704');
INSERT INTO `gvs_account` VALUES ('4896', '0', '景金锋', 'jingjinfeng', '', 'jingjinfeng@gomeplus.com', '', '', '0', '1466585607', '1466741605');
INSERT INTO `gvs_account` VALUES ('4897', '0', '刘太明', 'liutaiming', '', 'liutaiming@gomeplus.com', '', '', '0', '1466741151', '1466741427');
INSERT INTO `gvs_account` VALUES ('4898', '0', '马良才', 'maliangcai', '', 'maliangcai@gomeplus.com', '', '', '0', '1466741317', '1467363415');
INSERT INTO `gvs_account` VALUES ('4899', '0', '关珍珍', 'guanzhenzhen', '', 'guanzhenzhen@gomeplus.com', '', '', '0', '1467014257', '1467014257');
INSERT INTO `gvs_account` VALUES ('4900', '0', '彭玲', 'pengling', '', 'pengling@gomeplus.com', '', '', '0', '1468231307', '1469675941');
INSERT INTO `gvs_account` VALUES ('4901', '0', 'test', 'test111', '4061863caf7f28c0b0346719e764d561', 'test111@qq.com', '', '', '0', '1470037656', '1470037656');
INSERT INTO `gvs_account` VALUES ('4902', '0', '潘超', 'panchao', '', 'panchao@gomeplus.com', '', '', '0', '1470286069', '1471486603');
INSERT INTO `gvs_account` VALUES ('4903', '0', '何少剑', 'heshaojian', '', 'heshaojian@gomeplus.com', '', '', '0', '1471244410', '1471399218');
INSERT INTO `gvs_account` VALUES ('4904', '0', '张天骄', 'zhangtianjiao', '', 'zhangtianjiao@gomeplus.com', '', '', '0', '1471246006', '1471328679');
INSERT INTO `gvs_account` VALUES ('4905', '0', '王雯', 'wangwen', '', 'wangwen@gomeplus.com', '', '', '0', '1471246006', '1471398061');
INSERT INTO `gvs_account` VALUES ('4906', '0', '郑淳亮', 'zhengchunliang', '', 'zhengchunliang@gomeplus.com', '', '', '0', '1471339662', '1471417590');
INSERT INTO `gvs_account` VALUES ('4907', '0', '徐雅楠', 'xuyanan', '', 'xuyanan@gomeplus.com', '', '', '0', '1471340673', '1471492631');

-- ----------------------------
-- Table structure for gvs_account_department
-- ----------------------------
DROP TABLE IF EXISTS `gvs_account_department`;
CREATE TABLE `gvs_account_department` (
  `account_department_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `account_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `department_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '部门id',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`account_department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=1590 DEFAULT CHARSET=utf8 COMMENT='用户部门关系表';

-- ----------------------------
-- Records of gvs_account_department
-- ----------------------------
INSERT INTO `gvs_account_department` VALUES ('25', '4', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('26', '4', '2', '0');
INSERT INTO `gvs_account_department` VALUES ('27', '4', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('28', '4', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('29', '4', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('30', '4', '7', '0');
INSERT INTO `gvs_account_department` VALUES ('47', '7', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('54', '3', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('55', '3', '2', '0');
INSERT INTO `gvs_account_department` VALUES ('56', '3', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('57', '3', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('58', '3', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('59', '3', '6', '0');
INSERT INTO `gvs_account_department` VALUES ('66', '8', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('67', '8', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('68', '8', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('69', '8', '6', '0');
INSERT INTO `gvs_account_department` VALUES ('70', '8', '8', '0');
INSERT INTO `gvs_account_department` VALUES ('71', '8', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('82', '11', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('83', '11', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('84', '11', '8', '0');
INSERT INTO `gvs_account_department` VALUES ('85', '11', '11', '0');
INSERT INTO `gvs_account_department` VALUES ('86', '11', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('95', '15', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('96', '15', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('97', '15', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('98', '15', '7', '0');
INSERT INTO `gvs_account_department` VALUES ('99', '15', '8', '0');
INSERT INTO `gvs_account_department` VALUES ('100', '15', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('149', '9', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('150', '9', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('151', '9', '8', '0');
INSERT INTO `gvs_account_department` VALUES ('152', '9', '11', '0');
INSERT INTO `gvs_account_department` VALUES ('153', '9', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('178', '5', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('179', '5', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('180', '5', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('181', '5', '8', '0');
INSERT INTO `gvs_account_department` VALUES ('182', '5', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('183', '5', '6', '0');
INSERT INTO `gvs_account_department` VALUES ('190', '17', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('191', '17', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('192', '17', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('193', '17', '8', '0');
INSERT INTO `gvs_account_department` VALUES ('194', '17', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('195', '17', '6', '0');
INSERT INTO `gvs_account_department` VALUES ('277', '21', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('278', '21', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('279', '21', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('280', '21', '6', '0');
INSERT INTO `gvs_account_department` VALUES ('281', '21', '8', '0');
INSERT INTO `gvs_account_department` VALUES ('282', '21', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('430', '23', '13', '0');
INSERT INTO `gvs_account_department` VALUES ('431', '23', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('432', '23', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('433', '23', '12', '0');
INSERT INTO `gvs_account_department` VALUES ('510', '20', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('511', '20', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('512', '20', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('513', '20', '7', '0');
INSERT INTO `gvs_account_department` VALUES ('514', '20', '8', '0');
INSERT INTO `gvs_account_department` VALUES ('515', '20', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('518', '19', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('519', '19', '3', '0');
INSERT INTO `gvs_account_department` VALUES ('520', '19', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('521', '19', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('522', '19', '12', '0');
INSERT INTO `gvs_account_department` VALUES ('523', '19', '10', '0');
INSERT INTO `gvs_account_department` VALUES ('524', '26', '13', '0');
INSERT INTO `gvs_account_department` VALUES ('525', '26', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('526', '26', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('527', '26', '14', '0');
INSERT INTO `gvs_account_department` VALUES ('528', '27', '13', '0');
INSERT INTO `gvs_account_department` VALUES ('529', '27', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('530', '27', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('531', '27', '12', '0');
INSERT INTO `gvs_account_department` VALUES ('540', '18', '13', '0');
INSERT INTO `gvs_account_department` VALUES ('541', '18', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('542', '18', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('543', '18', '12', '0');
INSERT INTO `gvs_account_department` VALUES ('544', '16', '13', '0');
INSERT INTO `gvs_account_department` VALUES ('545', '16', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('546', '16', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('547', '16', '12', '0');
INSERT INTO `gvs_account_department` VALUES ('548', '28', '11', '0');
INSERT INTO `gvs_account_department` VALUES ('582', '4796', '1', '0');
INSERT INTO `gvs_account_department` VALUES ('644', '3619', '13', '0');
INSERT INTO `gvs_account_department` VALUES ('645', '3619', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('646', '3619', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('647', '3619', '15', '0');
INSERT INTO `gvs_account_department` VALUES ('777', '4800', '6', '0');
INSERT INTO `gvs_account_department` VALUES ('778', '4801', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('779', '4801', '53', '0');
INSERT INTO `gvs_account_department` VALUES ('780', '4801', '54', '0');
INSERT INTO `gvs_account_department` VALUES ('789', '4802', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('790', '4802', '53', '0');
INSERT INTO `gvs_account_department` VALUES ('791', '4802', '55', '0');
INSERT INTO `gvs_account_department` VALUES ('792', '4803', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('793', '4803', '56', '0');
INSERT INTO `gvs_account_department` VALUES ('794', '4803', '57', '0');
INSERT INTO `gvs_account_department` VALUES ('795', '4804', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('796', '4804', '56', '0');
INSERT INTO `gvs_account_department` VALUES ('797', '4804', '58', '0');
INSERT INTO `gvs_account_department` VALUES ('801', '24', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('802', '24', '50', '0');
INSERT INTO `gvs_account_department` VALUES ('803', '24', '51', '0');
INSERT INTO `gvs_account_department` VALUES ('804', '24', '52', '0');
INSERT INTO `gvs_account_department` VALUES ('805', '4799', '4', '0');
INSERT INTO `gvs_account_department` VALUES ('806', '4799', '5', '0');
INSERT INTO `gvs_account_department` VALUES ('807', '4799', '12', '0');
INSERT INTO `gvs_account_department` VALUES ('808', '4799', '13', '0');
INSERT INTO `gvs_account_department` VALUES ('812', '4805', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('813', '4805', '56', '0');
INSERT INTO `gvs_account_department` VALUES ('814', '4805', '58', '0');
INSERT INTO `gvs_account_department` VALUES ('820', '4807', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('821', '4807', '59', '0');
INSERT INTO `gvs_account_department` VALUES ('822', '4798', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('823', '4798', '59', '0');
INSERT INTO `gvs_account_department` VALUES ('824', '4798', '60', '0');
INSERT INTO `gvs_account_department` VALUES ('825', '6', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('826', '6', '59', '0');
INSERT INTO `gvs_account_department` VALUES ('827', '6', '60', '0');
INSERT INTO `gvs_account_department` VALUES ('831', '4806', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('832', '4806', '59', '0');
INSERT INTO `gvs_account_department` VALUES ('833', '4806', '60', '0');
INSERT INTO `gvs_account_department` VALUES ('834', '4809', '1', '1452494393');
INSERT INTO `gvs_account_department` VALUES ('852', '25', '2', '0');
INSERT INTO `gvs_account_department` VALUES ('853', '4810', '2', '0');
INSERT INTO `gvs_account_department` VALUES ('854', '4808', '49', '0');
INSERT INTO `gvs_account_department` VALUES ('855', '4808', '56', '0');
INSERT INTO `gvs_account_department` VALUES ('856', '4808', '61', '0');
INSERT INTO `gvs_account_department` VALUES ('858', '22', '2', '0');
INSERT INTO `gvs_account_department` VALUES ('901', '4823', '65', '0');
INSERT INTO `gvs_account_department` VALUES ('903', '4823', '69', '0');
INSERT INTO `gvs_account_department` VALUES ('921', '4827', '67', '0');
INSERT INTO `gvs_account_department` VALUES ('997', '4815', '67', '0');
INSERT INTO `gvs_account_department` VALUES ('1019', '4819', '69', '0');
INSERT INTO `gvs_account_department` VALUES ('1031', '4817', '67', '0');
INSERT INTO `gvs_account_department` VALUES ('1033', '4843', '67', '0');
INSERT INTO `gvs_account_department` VALUES ('1061', '4845', '67', '0');
INSERT INTO `gvs_account_department` VALUES ('1159', '4875', '65', '0');
INSERT INTO `gvs_account_department` VALUES ('1163', '4877', '65', '0');
INSERT INTO `gvs_account_department` VALUES ('1165', '4879', '69', '0');
INSERT INTO `gvs_account_department` VALUES ('1167', '4881', '67', '0');
INSERT INTO `gvs_account_department` VALUES ('1169', '4881', '69', '0');
INSERT INTO `gvs_account_department` VALUES ('1171', '4881', '71', '0');
INSERT INTO `gvs_account_department` VALUES ('1185', '4857', '73', '0');
INSERT INTO `gvs_account_department` VALUES ('1187', '4853', '73', '0');
INSERT INTO `gvs_account_department` VALUES ('1193', '4883', '73', '0');
INSERT INTO `gvs_account_department` VALUES ('1195', '4885', '73', '0');
INSERT INTO `gvs_account_department` VALUES ('1313', '4829', '65', '0');
INSERT INTO `gvs_account_department` VALUES ('1315', '4829', '105', '0');
INSERT INTO `gvs_account_department` VALUES ('1317', '4829', '115', '0');
INSERT INTO `gvs_account_department` VALUES ('1326', '4886', '67', '0');
INSERT INTO `gvs_account_department` VALUES ('1327', '4859', '65', '0');
INSERT INTO `gvs_account_department` VALUES ('1328', '4859', '105', '0');
INSERT INTO `gvs_account_department` VALUES ('1329', '4859', '115', '0');
INSERT INTO `gvs_account_department` VALUES ('1330', '4812', '65', '0');
INSERT INTO `gvs_account_department` VALUES ('1331', '4812', '105', '0');
INSERT INTO `gvs_account_department` VALUES ('1332', '4812', '115', '0');
INSERT INTO `gvs_account_department` VALUES ('1335', '4861', '65', '1463981555');
INSERT INTO `gvs_account_department` VALUES ('1336', '4861', '105', '1463981555');
INSERT INTO `gvs_account_department` VALUES ('1337', '4861', '115', '1463981555');
INSERT INTO `gvs_account_department` VALUES ('1338', '4865', '65', '1463993111');
INSERT INTO `gvs_account_department` VALUES ('1339', '4865', '105', '1463993111');
INSERT INTO `gvs_account_department` VALUES ('1340', '4865', '115', '1463993111');
INSERT INTO `gvs_account_department` VALUES ('1344', '4811', '65', '1464060649');
INSERT INTO `gvs_account_department` VALUES ('1345', '4811', '105', '1464060649');
INSERT INTO `gvs_account_department` VALUES ('1346', '4811', '115', '1464060649');
INSERT INTO `gvs_account_department` VALUES ('1368', '4855', '69', '1464661443');
INSERT INTO `gvs_account_department` VALUES ('1369', '4851', '69', '1464661470');
INSERT INTO `gvs_account_department` VALUES ('1370', '4849', '69', '1464661515');
INSERT INTO `gvs_account_department` VALUES ('1371', '4847', '69', '1464661527');
INSERT INTO `gvs_account_department` VALUES ('1372', '4841', '69', '1464661552');
INSERT INTO `gvs_account_department` VALUES ('1373', '4839', '69', '1464661564');
INSERT INTO `gvs_account_department` VALUES ('1374', '4837', '69', '1464661576');
INSERT INTO `gvs_account_department` VALUES ('1380', '4825', '65', '1465197435');
INSERT INTO `gvs_account_department` VALUES ('1381', '4825', '105', '1465197435');
INSERT INTO `gvs_account_department` VALUES ('1382', '4825', '115', '1465197435');
INSERT INTO `gvs_account_department` VALUES ('1404', '4835', '65', '1465798040');
INSERT INTO `gvs_account_department` VALUES ('1405', '4835', '105', '1465798040');
INSERT INTO `gvs_account_department` VALUES ('1406', '4835', '115', '1465798040');
INSERT INTO `gvs_account_department` VALUES ('1433', '4890', '65', '1465810774');
INSERT INTO `gvs_account_department` VALUES ('1434', '4890', '105', '1465810774');
INSERT INTO `gvs_account_department` VALUES ('1435', '4890', '115', '1465810774');
INSERT INTO `gvs_account_department` VALUES ('1439', '4889', '65', '1465884346');
INSERT INTO `gvs_account_department` VALUES ('1440', '4889', '105', '1465884346');
INSERT INTO `gvs_account_department` VALUES ('1441', '4889', '115', '1465884346');
INSERT INTO `gvs_account_department` VALUES ('1447', '4831', '65', '1466158122');
INSERT INTO `gvs_account_department` VALUES ('1448', '4831', '105', '1466158122');
INSERT INTO `gvs_account_department` VALUES ('1449', '4831', '115', '1466158122');
INSERT INTO `gvs_account_department` VALUES ('1463', '4895', '65', '1466497163');
INSERT INTO `gvs_account_department` VALUES ('1464', '4895', '105', '1466497163');
INSERT INTO `gvs_account_department` VALUES ('1465', '4895', '115', '1466497163');
INSERT INTO `gvs_account_department` VALUES ('1466', '4894', '65', '1466499754');
INSERT INTO `gvs_account_department` VALUES ('1467', '4894', '105', '1466499754');
INSERT INTO `gvs_account_department` VALUES ('1468', '4894', '115', '1466499754');
INSERT INTO `gvs_account_department` VALUES ('1478', '4871', '65', '1466562117');
INSERT INTO `gvs_account_department` VALUES ('1479', '4871', '83', '1466562117');
INSERT INTO `gvs_account_department` VALUES ('1480', '4871', '91', '1466562117');
INSERT INTO `gvs_account_department` VALUES ('1481', '4833', '105', '1466574926');
INSERT INTO `gvs_account_department` VALUES ('1482', '4833', '115', '1466574926');
INSERT INTO `gvs_account_department` VALUES ('1495', '4891', '65', '1466595519');
INSERT INTO `gvs_account_department` VALUES ('1496', '4891', '105', '1466595519');
INSERT INTO `gvs_account_department` VALUES ('1497', '4891', '115', '1466595519');
INSERT INTO `gvs_account_department` VALUES ('1498', '4893', '65', '1466595791');
INSERT INTO `gvs_account_department` VALUES ('1499', '4893', '105', '1466595791');
INSERT INTO `gvs_account_department` VALUES ('1500', '4893', '115', '1466595791');
INSERT INTO `gvs_account_department` VALUES ('1507', '4887', '65', '1466596290');
INSERT INTO `gvs_account_department` VALUES ('1508', '4887', '69', '1466596290');
INSERT INTO `gvs_account_department` VALUES ('1509', '4863', '65', '1466652878');
INSERT INTO `gvs_account_department` VALUES ('1510', '4863', '105', '1466652878');
INSERT INTO `gvs_account_department` VALUES ('1511', '4863', '115', '1466652878');
INSERT INTO `gvs_account_department` VALUES ('1512', '4867', '65', '1466671136');
INSERT INTO `gvs_account_department` VALUES ('1513', '4867', '83', '1466671136');
INSERT INTO `gvs_account_department` VALUES ('1514', '4867', '118', '1466671136');
INSERT INTO `gvs_account_department` VALUES ('1521', '4897', '65', '1466741382');
INSERT INTO `gvs_account_department` VALUES ('1522', '4897', '105', '1466741382');
INSERT INTO `gvs_account_department` VALUES ('1523', '4897', '119', '1466741382');
INSERT INTO `gvs_account_department` VALUES ('1527', '4896', '65', '1466741605');
INSERT INTO `gvs_account_department` VALUES ('1528', '4896', '105', '1466741605');
INSERT INTO `gvs_account_department` VALUES ('1529', '4896', '115', '1466741605');
INSERT INTO `gvs_account_department` VALUES ('1530', '4898', '65', '1466751722');
INSERT INTO `gvs_account_department` VALUES ('1531', '4898', '105', '1466751722');
INSERT INTO `gvs_account_department` VALUES ('1532', '4898', '120', '1466751722');
INSERT INTO `gvs_account_department` VALUES ('1537', '4892', '65', '1466751766');
INSERT INTO `gvs_account_department` VALUES ('1538', '4892', '105', '1466751766');
INSERT INTO `gvs_account_department` VALUES ('1539', '4892', '107', '1466751766');
INSERT INTO `gvs_account_department` VALUES ('1540', '4892', '115', '1466751766');
INSERT INTO `gvs_account_department` VALUES ('1541', '4899', '65', '1467014257');
INSERT INTO `gvs_account_department` VALUES ('1542', '4899', '105', '1467014257');
INSERT INTO `gvs_account_department` VALUES ('1543', '4899', '121', '1467014257');
INSERT INTO `gvs_account_department` VALUES ('1550', '4873', '65', '1468218377');
INSERT INTO `gvs_account_department` VALUES ('1551', '4873', '105', '1468218377');
INSERT INTO `gvs_account_department` VALUES ('1552', '4873', '121', '1468218377');
INSERT INTO `gvs_account_department` VALUES ('1556', '4900', '65', '1468231338');
INSERT INTO `gvs_account_department` VALUES ('1557', '4900', '105', '1468231338');
INSERT INTO `gvs_account_department` VALUES ('1558', '4900', '115', '1468231338');
INSERT INTO `gvs_account_department` VALUES ('1559', '4869', '65', '1468288570');
INSERT INTO `gvs_account_department` VALUES ('1560', '4869', '105', '1468288570');
INSERT INTO `gvs_account_department` VALUES ('1561', '4869', '121', '1468288570');
INSERT INTO `gvs_account_department` VALUES ('1562', '4813', '65', '1469518034');
INSERT INTO `gvs_account_department` VALUES ('1563', '4813', '105', '1469518034');
INSERT INTO `gvs_account_department` VALUES ('1564', '4813', '115', '1469518034');
INSERT INTO `gvs_account_department` VALUES ('1565', '4901', '65', '1470037656');
INSERT INTO `gvs_account_department` VALUES ('1569', '4902', '65', '1470378358');
INSERT INTO `gvs_account_department` VALUES ('1570', '4902', '105', '1470378358');
INSERT INTO `gvs_account_department` VALUES ('1571', '4902', '115', '1470378358');
INSERT INTO `gvs_account_department` VALUES ('1572', '4903', '65', '1471244410');
INSERT INTO `gvs_account_department` VALUES ('1573', '4903', '105', '1471244410');
INSERT INTO `gvs_account_department` VALUES ('1574', '4903', '115', '1471244410');
INSERT INTO `gvs_account_department` VALUES ('1575', '4904', '65', '1471246006');
INSERT INTO `gvs_account_department` VALUES ('1576', '4904', '105', '1471246006');
INSERT INTO `gvs_account_department` VALUES ('1577', '4904', '115', '1471246006');
INSERT INTO `gvs_account_department` VALUES ('1578', '4905', '65', '1471338296');
INSERT INTO `gvs_account_department` VALUES ('1579', '4905', '105', '1471338296');
INSERT INTO `gvs_account_department` VALUES ('1580', '4905', '115', '1471338296');
INSERT INTO `gvs_account_department` VALUES ('1581', '4906', '65', '1471339662');
INSERT INTO `gvs_account_department` VALUES ('1582', '4906', '105', '1471339662');
INSERT INTO `gvs_account_department` VALUES ('1583', '4906', '115', '1471339662');
INSERT INTO `gvs_account_department` VALUES ('1584', '4907', '65', '1471340673');
INSERT INTO `gvs_account_department` VALUES ('1585', '4907', '105', '1471340673');
INSERT INTO `gvs_account_department` VALUES ('1586', '4907', '115', '1471340673');
INSERT INTO `gvs_account_department` VALUES ('1587', '4888', '65', '1471440892');
INSERT INTO `gvs_account_department` VALUES ('1588', '4888', '105', '1471440892');
INSERT INTO `gvs_account_department` VALUES ('1589', '4888', '115', '1471440892');

-- ----------------------------
-- Table structure for gvs_account_role
-- ----------------------------
DROP TABLE IF EXISTS `gvs_account_role`;
CREATE TABLE `gvs_account_role` (
  `account_role_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `account_id` bigint(20) unsigned NOT NULL DEFAULT '0' COMMENT '用户id',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`account_role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=527 DEFAULT CHARSET=utf8 COMMENT='用户角色关系表';

-- ----------------------------
-- Records of gvs_account_role
-- ----------------------------
INSERT INTO `gvs_account_role` VALUES ('5', '4', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('8', '6', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('12', '7', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('14', '3', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('16', '8', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('19', '11', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('23', '15', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('26', '9', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('31', '5', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('33', '17', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('51', '21', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('90', '23', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('110', '20', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('113', '19', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('114', '26', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('115', '27', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('118', '18', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('119', '16', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('120', '28', '8', '0');
INSERT INTO `gvs_account_role` VALUES ('134', '4796', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('158', '3619', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('172', '4800', '22', '0');
INSERT INTO `gvs_account_role` VALUES ('173', '4801', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('177', '4802', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('178', '4803', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('179', '4804', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('180', '24', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('181', '24', '27', '0');
INSERT INTO `gvs_account_role` VALUES ('182', '4799', '27', '0');
INSERT INTO `gvs_account_role` VALUES ('183', '4799', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('187', '4805', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('188', '4806', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('191', '4807', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('192', '4807', '100', '0');
INSERT INTO `gvs_account_role` VALUES ('193', '4798', '2', '0');
INSERT INTO `gvs_account_role` VALUES ('194', '4798', '27', '0');
INSERT INTO `gvs_account_role` VALUES ('195', '4798', '102', '0');
INSERT INTO `gvs_account_role` VALUES ('197', '4809', '2', '1452494393');
INSERT INTO `gvs_account_role` VALUES ('210', '25', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('211', '4810', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('212', '4808', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('214', '22', '1', '0');
INSERT INTO `gvs_account_role` VALUES ('225', '1', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('241', '4823', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('255', '4827', '109', '0');
INSERT INTO `gvs_account_role` VALUES ('259', '4812', '117', '0');
INSERT INTO `gvs_account_role` VALUES ('265', '4831', '117', '0');
INSERT INTO `gvs_account_role` VALUES ('313', '4815', '109', '0');
INSERT INTO `gvs_account_role` VALUES ('331', '4819', '109', '0');
INSERT INTO `gvs_account_role` VALUES ('343', '4817', '117', '0');
INSERT INTO `gvs_account_role` VALUES ('345', '4843', '109', '0');
INSERT INTO `gvs_account_role` VALUES ('365', '4845', '109', '0');
INSERT INTO `gvs_account_role` VALUES ('385', '4811', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('397', '4859', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('405', '4865', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('409', '4861', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('413', '4867', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('421', '4873', '3', '0');
INSERT INTO `gvs_account_role` VALUES ('423', '4875', '117', '0');
INSERT INTO `gvs_account_role` VALUES ('427', '4877', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('429', '4879', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('431', '4881', '117', '0');
INSERT INTO `gvs_account_role` VALUES ('441', '4829', '117', '0');
INSERT INTO `gvs_account_role` VALUES ('443', '4857', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('445', '4853', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('447', '4883', '109', '0');
INSERT INTO `gvs_account_role` VALUES ('449', '4885', '109', '0');
INSERT INTO `gvs_account_role` VALUES ('450', '4886', '107', '0');
INSERT INTO `gvs_account_role` VALUES ('454', '4855', '117', '1464661443');
INSERT INTO `gvs_account_role` VALUES ('455', '4851', '117', '1464661470');
INSERT INTO `gvs_account_role` VALUES ('456', '4849', '117', '1464661515');
INSERT INTO `gvs_account_role` VALUES ('457', '4847', '117', '1464661527');
INSERT INTO `gvs_account_role` VALUES ('458', '4841', '117', '1464661552');
INSERT INTO `gvs_account_role` VALUES ('459', '4839', '117', '1464661565');
INSERT INTO `gvs_account_role` VALUES ('460', '4837', '117', '1464661576');
INSERT INTO `gvs_account_role` VALUES ('461', '4825', '117', '1465195497');
INSERT INTO `gvs_account_role` VALUES ('466', '4890', '156', '1465797034');
INSERT INTO `gvs_account_role` VALUES ('467', '4889', '156', '1465797077');
INSERT INTO `gvs_account_role` VALUES ('469', '4835', '156', '1465797127');
INSERT INTO `gvs_account_role` VALUES ('481', '4895', '156', '1466496063');
INSERT INTO `gvs_account_role` VALUES ('482', '4894', '156', '1466496071');
INSERT INTO `gvs_account_role` VALUES ('485', '4871', '157', '1466562014');
INSERT INTO `gvs_account_role` VALUES ('486', '4833', '156', '1466574926');
INSERT INTO `gvs_account_role` VALUES ('490', '4891', '157', '1466595447');
INSERT INTO `gvs_account_role` VALUES ('491', '4891', '1', '1466595447');
INSERT INTO `gvs_account_role` VALUES ('492', '4891', '2', '1466595447');
INSERT INTO `gvs_account_role` VALUES ('493', '4891', '3', '1466595447');
INSERT INTO `gvs_account_role` VALUES ('494', '4891', '156', '1466595447');
INSERT INTO `gvs_account_role` VALUES ('495', '4893', '1', '1466595791');
INSERT INTO `gvs_account_role` VALUES ('498', '4887', '117', '1466596290');
INSERT INTO `gvs_account_role` VALUES ('499', '4863', '1', '1466652878');
INSERT INTO `gvs_account_role` VALUES ('502', '4897', '1', '1466741382');
INSERT INTO `gvs_account_role` VALUES ('504', '4896', '1', '1466741605');
INSERT INTO `gvs_account_role` VALUES ('505', '4898', '1', '1466751722');
INSERT INTO `gvs_account_role` VALUES ('508', '4892', '157', '1466751766');
INSERT INTO `gvs_account_role` VALUES ('509', '4892', '156', '1466751766');
INSERT INTO `gvs_account_role` VALUES ('510', '4899', '3', '1467014257');
INSERT INTO `gvs_account_role` VALUES ('513', '4900', '1', '1468231338');
INSERT INTO `gvs_account_role` VALUES ('514', '4869', '156', '1468288570');
INSERT INTO `gvs_account_role` VALUES ('515', '4813', '1', '1469518034');
INSERT INTO `gvs_account_role` VALUES ('516', '4813', '2', '1469518034');
INSERT INTO `gvs_account_role` VALUES ('517', '4813', '3', '1469518034');
INSERT INTO `gvs_account_role` VALUES ('518', '4901', '117', '1470037656');
INSERT INTO `gvs_account_role` VALUES ('520', '4902', '1', '1470378358');
INSERT INTO `gvs_account_role` VALUES ('521', '4903', '3', '1471244410');
INSERT INTO `gvs_account_role` VALUES ('522', '4904', '3', '1471246006');
INSERT INTO `gvs_account_role` VALUES ('523', '4905', '3', '1471338296');
INSERT INTO `gvs_account_role` VALUES ('524', '4906', '3', '1471339662');
INSERT INTO `gvs_account_role` VALUES ('525', '4907', '107', '1471340673');
INSERT INTO `gvs_account_role` VALUES ('526', '4888', '1', '1471440892');

-- ----------------------------
-- Table structure for gvs_department
-- ----------------------------
DROP TABLE IF EXISTS `gvs_department`;
CREATE TABLE `gvs_department` (
  `department_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '部门id',
  `name` char(100) NOT NULL DEFAULT '' COMMENT '部门名称',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级部门',
  `path` char(100) NOT NULL DEFAULT '' COMMENT '部门层级路径:0,1,2,3,',
  `sequence` int(10) NOT NULL DEFAULT '0' COMMENT '排序，数字小靠前',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`department_id`)
) ENGINE=InnoDB AUTO_INCREMENT=122 DEFAULT CHARSET=utf8 COMMENT='部门表';

-- ----------------------------
-- Records of gvs_department
-- ----------------------------
INSERT INTO `gvs_department` VALUES ('65', '美信', '0', '', '10', '1457519184', '1457519184');
INSERT INTO `gvs_department` VALUES ('69', '系统开发部', '65', '65', '3', '1457580811', '1458097628');
INSERT INTO `gvs_department` VALUES ('71', '搜索部', '65', '65', '5', '1459217028', '1460537374');
INSERT INTO `gvs_department` VALUES ('73', '产品部', '65', '65', '6', '1460690801', '1460690801');
INSERT INTO `gvs_department` VALUES ('75', '基础开发部', '65', '65', '7', '1461580054', '1461580054');
INSERT INTO `gvs_department` VALUES ('77', '平台产品部', '65', '65', '8', '1461917747', '1461917747');
INSERT INTO `gvs_department` VALUES ('83', '产品中心', '65', '65', '10', '1463393533', '1463395159');
INSERT INTO `gvs_department` VALUES ('91', '电商平台产品部', '83', '65,83', '1', '1463455520', '1463455520');
INSERT INTO `gvs_department` VALUES ('105', '技术中心', '65', '65', '11', '1463464767', '1463464767');
INSERT INTO `gvs_department` VALUES ('107', '测试部1', '105', '65,105', '3', '1463464767', '1465799052');
INSERT INTO `gvs_department` VALUES ('115', '系统开发部', '105', '65,105', '2', '1463562429', '1463562429');
INSERT INTO `gvs_department` VALUES ('118', '视频产品部', '83', '65,83', '2', '1466671136', '1466671136');
INSERT INTO `gvs_department` VALUES ('119', '服务研发部', '105', '65,105', '4', '1466741151', '1466741151');
INSERT INTO `gvs_department` VALUES ('120', '无线研发部', '105', '65,105', '5', '1466741317', '1466741317');
INSERT INTO `gvs_department` VALUES ('121', '测试部', '105', '65,105', '6', '1467014257', '1467014257');

-- ----------------------------
-- Table structure for gvs_log
-- ----------------------------
DROP TABLE IF EXISTS `gvs_log`;
CREATE TABLE `gvs_log` (
  `log_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '日志id',
  `portal` char(100) NOT NULL DEFAULT '' COMMENT '入口',
  `controller` char(100) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` char(100) NOT NULL DEFAULT '' COMMENT '动作',
  `get` text NOT NULL COMMENT 'get参数',
  `post` text NOT NULL COMMENT 'post参数',
  `message` varchar(255) NOT NULL DEFAULT '' COMMENT '信息',
  `ip` char(100) NOT NULL DEFAULT '' COMMENT 'ip地址',
  `user_agent` char(200) NOT NULL DEFAULT '' COMMENT '用户代理',
  `referer` char(100) NOT NULL DEFAULT '' COMMENT 'referer',
  `account_id` int(10) NOT NULL DEFAULT '0' COMMENT '帐号id',
  `account_name` char(100) NOT NULL DEFAULT '' COMMENT '帐号名',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`log_id`)
) ENGINE=InnoDB AUTO_INCREMENT=22269 DEFAULT CHARSET=utf8 COMMENT='日志表';

-- ----------------------------
-- Records of gvs_log
-- ----------------------------

-- ----------------------------
-- Table structure for gvs_log_crash
-- ----------------------------
DROP TABLE IF EXISTS `gvs_log_crash`;
CREATE TABLE `gvs_log_crash` (
  `log_crash_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '异常日志id',
  `ip` varchar(20) NOT NULL DEFAULT '' COMMENT 'IP',
  `hostname` varchar(100) NOT NULL DEFAULT '' COMMENT '服务器名',
  `level` tinyint(1) NOT NULL DEFAULT '0' COMMENT '级别',
  `file` varchar(256) NOT NULL DEFAULT '' COMMENT '文件',
  `line` int(10) NOT NULL DEFAULT '0' COMMENT '行数',
  `message` text NOT NULL COMMENT '信息',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`log_crash_id`)
) ENGINE=InnoDB AUTO_INCREMENT=151730 DEFAULT CHARSET=utf8 COMMENT='异常日志表';

-- ----------------------------
-- Records of gvs_log_crash
-- ----------------------------

-- ----------------------------
-- Table structure for gvs_module
-- ----------------------------
DROP TABLE IF EXISTS `gvs_module`;
CREATE TABLE `gvs_module` (
  `module_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '模块id',
  `name` char(100) NOT NULL DEFAULT '' COMMENT '模块名',
  `module` char(100) NOT NULL DEFAULT '' COMMENT '模块',
  `system_id` char(100) NOT NULL DEFAULT '' COMMENT '系统id',
  `portal` char(100) NOT NULL DEFAULT '' COMMENT '入口文件',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 －1删除 0默认',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`module_id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8 COMMENT='模块表';

-- ----------------------------
-- Records of gvs_module
-- ----------------------------
INSERT INTO `gvs_module` VALUES ('1', '默认', '', '1', 'index.php', '0', '1406025330', '1463049884');

-- ----------------------------
-- Table structure for gvs_privilege
-- ----------------------------
DROP TABLE IF EXISTS `gvs_privilege`;
CREATE TABLE `gvs_privilege` (
  `privilege_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '权限id',
  `name` char(30) NOT NULL DEFAULT '' COMMENT '权限名',
  `parent_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '上级',
  `system_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '系统id',
  `module_id` int(10) NOT NULL DEFAULT '0' COMMENT 'module_id',
  `domain` char(100) NOT NULL DEFAULT '' COMMENT '域名',
  `portal` char(50) NOT NULL DEFAULT '' COMMENT '默认文件',
  `module` char(100) NOT NULL DEFAULT '',
  `controller` char(100) NOT NULL DEFAULT '' COMMENT '控制器',
  `action` char(100) NOT NULL DEFAULT '' COMMENT '动作',
  `target` char(255) NOT NULL DEFAULT '' COMMENT '目标地址',
  `icon` char(100) NOT NULL DEFAULT '' COMMENT '图标（用于展示)',
  `type` enum('controller','menu','navigator') DEFAULT 'controller' COMMENT '权限类型：控制器、菜单、导航',
  `is_display` tinyint(1) NOT NULL DEFAULT '0' COMMENT '是否显示：0不显示 1显示',
  `sequence` int(10) NOT NULL DEFAULT '0' COMMENT '排序(越小越靠前)',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`privilege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=472 DEFAULT CHARSET=utf8 COMMENT='权限（动作）表';

-- ----------------------------
-- Records of gvs_privilege
-- ----------------------------
INSERT INTO `gvs_privilege` VALUES ('1', '我的', '0', '1', '1', 'gvs.test.gomeplus.com', 'index.php', '', '', '', '', 'glyphicon glyphicon-wrench', 'navigator', '1', '0', '1463393520', '1463393520');
INSERT INTO `gvs_privilege` VALUES ('2', '系统登录', '1', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'author', '', '', '', 'menu', '0', '0', '1395234938', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('3', '登录页', '2', '1', '1', 'gvs.dev.gomeplus.com', 'index.php', '', 'author', 'index', '', '', 'controller', '0', '1', '1460538112', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('4', '首页', '2', '1', '1', 'gvs.dev.gomeplus.com', 'index.php', '', 'main', 'index', '', '', 'controller', '0', '0', '1460538025', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('5', '登录', '2', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'author', 'login', '', '', 'controller', '0', '2', '1399459361', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('6', '退出', '2', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'author', 'logout', '', '', 'controller', '0', '3', '1399459467', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('7', '我的帐号', '1', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'profile', '', '', 'glyphicon glyphicon-info-sign', 'menu', '1', '1', '1395234726', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('8', '个人首页', '7', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'profile', 'index', '', '', 'controller', '0', '0', '1416471928', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('9', '我的资料', '7', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'profile', 'edit', '', '', 'controller', '1', '1', '1395283490', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('10', '修改密码', '7', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'profile', 'password', '', '', 'controller', '0', '2', '1395283521', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('11', '保存我的资料', '7', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'profile', 'modify', '', '', 'controller', '0', '3', '1399459688', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('12', '保存密码', '7', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'profile', 'savepassword', '', '', 'controller', '0', '4', '1399459716', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('13', '设置', '0', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', '', '', '', 'glyphicon glyphicon-cog', 'navigator', '1', '1', '1398759817', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('14', '系统管理', '13', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'system', '', '', 'glyphicon glyphicon-hdd', 'menu', '1', '0', '1394791332', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('15', '系统首页', '14', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'system', 'index', '', '', 'controller', '0', '0', '1399460939', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('16', '系统列表', '14', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'system', 'list', '', '', 'controller', '1', '1', '1394791392', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('17', '添加系统', '14', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'system', 'add', '', '', 'controller', '1', '2', '1394791367', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('18', '修改系统', '14', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'system', 'edit', '', '', 'controller', '0', '3', '1399461078', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('19', '添加保存系统', '14', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'system', 'save', '', '', 'controller', '0', '4', '1399461098', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('20', '修改保存系统', '14', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'system', 'modify', '', '', 'controller', '0', '5', '1399461111', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('21', '删除系统', '14', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'system', 'delete', '', '', 'controller', '0', '6', '1399461139', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('22', '帐号管理', '13', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'account', '', '', 'glyphicon glyphicon-user', 'menu', '1', '1', '1394787350', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('23', '帐号首页', '22', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'account', 'index', '', '', 'controller', '0', '0', '1399460009', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('24', '帐号列表', '22', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'account', 'list', '', '', 'controller', '1', '1', '1394788574', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('25', '添加帐号', '22', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'account', 'add', '', '', 'controller', '1', '2', '1399460030', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('26', '修改帐号', '22', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'account', 'edit', '', '', 'controller', '0', '3', '1399460315', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('27', '添加保存帐号', '22', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'account', 'save', '', '', 'controller', '0', '4', '1399460374', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('28', '修改保存帐号', '22', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'account', 'modify', '', '', 'controller', '0', '5', '1399460392', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('29', '删除帐号', '22', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'account', 'delete', '', '', 'controller', '0', '6', '1395297763', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('30', '权限管理', '13', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'privilege', '', '', 'glyphicon glyphicon-lock', 'menu', '1', '2', '1394790850', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('31', '权限首页', '30', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'privilege', 'index', '', '', 'controller', '0', '0', '1399460597', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('32', '权限列表', '30', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'privilege', 'list', '', '', 'controller', '1', '1', '1394791206', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('33', '添加权限', '30', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'privilege', 'add', '', '', 'controller', '1', '2', '1394791088', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('34', '修改权限', '30', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'privilege', 'edit', '', '', 'controller', '0', '3', '1399460668', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('35', '添加保存权限', '30', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'privilege', 'save', '', '', 'controller', '0', '4', '1399460805', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('36', '修改保存权限', '30', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'privilege', 'modify', '', '', 'controller', '0', '5', '1399460876', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('37', '删除权限', '30', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'privilege', 'delete', '', '', 'controller', '0', '6', '1395036721', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('38', '角色管理', '13', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', '', '', 'glyphicon glyphicon-tag', 'menu', '1', '3', '1394791332', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('39', '角色首页', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'index', '', '', 'controller', '0', '0', '1399460939', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('40', '角色列表', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'list', '', '', 'controller', '1', '1', '1394791392', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('41', '添加角色', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'add', '', '', 'controller', '1', '2', '1394791367', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('42', '修改角色', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'edit', '', '', 'controller', '0', '3', '1399461078', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('43', '添加保存角色', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'save', '', '', 'controller', '0', '4', '1399461098', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('44', '修改保存角色', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'modify', '', '', 'controller', '0', '5', '1399461111', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('45', '删除角色', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'delete', '', '', 'controller', '0', '6', '1399461139', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('46', '角色成员列表', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'members', '', '', 'controller', '0', '7', '1399461139', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('47', '角色权限列表', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'privilege', '', '', 'controller', '0', '8', '1399461139', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('48', '角色权限赋予', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'grant', '', '', 'controller', '0', '9', '1399461139', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('49', '角色权限收回', '38', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'role', 'revoke', '', '', 'controller', '0', '10', '1399461139', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('50', '部门管理', '13', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', '', '', 'glyphicon glyphicon-globe', 'menu', '1', '4', '1394791332', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('51', '部门首页', '50', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', 'index', '', '', 'controller', '0', '0', '1399460939', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('52', '部门列表', '50', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', 'list', '', '', 'controller', '1', '1', '1394791392', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('53', '添加部门', '50', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', 'add', '', '', 'controller', '1', '2', '1394791367', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('54', '修改部门', '50', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', 'edit', '', '', 'controller', '0', '3', '1399461078', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('55', '添加保存部门', '50', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', 'save', '', '', 'controller', '0', '4', '1399461098', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('56', '修改保存部门', '50', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', 'modify', '', '', 'controller', '0', '5', '1399461111', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('57', '删除部门', '50', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', 'delete', '', '', 'controller', '0', '6', '1399461139', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('58', '角色成员列表', '50', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'department', 'members', '', '', 'controller', '0', '7', '1399461139', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('67', '日志管理', '13', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'log', '', '', 'glyphicon glyphicon-inbox', 'menu', '1', '3', '1400498235', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('68', '日志首页', '67', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'log', 'index', '', '', 'controller', '0', '0', '1400498263', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('69', '日志列表', '67', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'log', 'list', '', '', 'controller', '1', '0', '1400498263', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('166', '模块管理', '13', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'module', '', '', 'glyphicon glyphicon-list-alt', 'menu', '1', '7', '1400000000', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('167', '模块首页', '166', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'module', 'index', '', '', 'controller', '0', '0', '1400000000', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('168', '模块列表', '166', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'module', 'list', '', '', 'controller', '1', '1', '1400000000', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('169', '添加模块', '166', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'module', 'add', '', '', 'controller', '1', '2', '1400000000', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('170', '修改模块', '166', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'module', 'edit', '', '', 'controller', '0', '3', '1400000000', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('171', '添加保存模块', '166', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'module', 'save', '', '', 'controller', '0', '4', '1400000000', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('172', '修改保存模块', '166', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'module', 'modify', '', '', 'controller', '0', '5', '1400000000', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('173', '删除模块', '166', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'module', 'delete', '', '', 'controller', '0', '6', '1400000000', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('338', '异常日志', '67', '1', '1', 'vms.dev.video.gome.com', 'index.php', '', 'log', 'crashes', '', '', 'controller', '1', '2', '1441525347', '1463049884');
INSERT INTO `gvs_privilege` VALUES ('343', '消息管理', '359', '1', '1', 'gvs.dev.gomeplus.com', 'index.php', '', 'Wmq_Producer', 'list', '', 'glyphicon glyphicon-bell', 'controller', '1', '0', '1460965898', '1463049884');

-- ----------------------------
-- Table structure for gvs_role
-- ----------------------------
DROP TABLE IF EXISTS `gvs_role`;
CREATE TABLE `gvs_role` (
  `role_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `department_id` int(10) NOT NULL DEFAULT '0' COMMENT '部门id',
  `name` char(10) NOT NULL DEFAULT '' COMMENT '角色名称',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`role_id`)
) ENGINE=InnoDB AUTO_INCREMENT=161 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of gvs_role
-- ----------------------------
INSERT INTO `gvs_role` VALUES ('1', '115', '管理员', '1398761837', '1417760205');
INSERT INTO `gvs_role` VALUES ('2', '115', '资源管理员', '1399457263', '1417760219');
INSERT INTO `gvs_role` VALUES ('3', '115', '普通账号', '1406803133', '1406803133');
INSERT INTO `gvs_role` VALUES ('4', '7', '产品实习生', '1406803262', '1406803262');
INSERT INTO `gvs_role` VALUES ('5', '7', '产品助理', '1406803523', '1406803523');
INSERT INTO `gvs_role` VALUES ('7', '7', '运营', '1409901979', '1409901979');
INSERT INTO `gvs_role` VALUES ('8', '11', '研发测试工程师', '1410232864', '1410232864');
INSERT INTO `gvs_role` VALUES ('17', '13', 'hytest1', '1414050506', '1414050506');
INSERT INTO `gvs_role` VALUES ('20', '13', 'hello1', '1414738846', '1414738846');
INSERT INTO `gvs_role` VALUES ('21', '13', 'fss', '1414738879', '1414738879');
INSERT INTO `gvs_role` VALUES ('22', '6', '话题项目测试', '1432619471', '1432619471');
INSERT INTO `gvs_role` VALUES ('27', '1', '点播视频审核', '1441955792', '1441955792');
INSERT INTO `gvs_role` VALUES ('100', '1', '直播管理员', '1435832237', '1435832237');
INSERT INTO `gvs_role` VALUES ('101', '1', '普通直播编辑', '1435832286', '1435832286');
INSERT INTO `gvs_role` VALUES ('102', '1', '体育直播编辑', '1435832299', '1435832299');
INSERT INTO `gvs_role` VALUES ('103', '1', '娱乐直播编辑', '1435832313', '1435832313');
INSERT INTO `gvs_role` VALUES ('104', '62', '测试工程师', '1457079314', '1457079314');
INSERT INTO `gvs_role` VALUES ('107', '67', '管理员', '1457578091', '1458552840');
INSERT INTO `gvs_role` VALUES ('109', '67', '产品经理', '1457581823', '1457581823');
INSERT INTO `gvs_role` VALUES ('117', '69', '管理员', '1458641100', '1463717140');
INSERT INTO `gvs_role` VALUES ('149', '79', '测试', '1463455262', '1463455262');
INSERT INTO `gvs_role` VALUES ('150', '67', '1', '1463976030', '1463976030');
INSERT INTO `gvs_role` VALUES ('156', '115', '管理员', '1465796998', '1465797396');
INSERT INTO `gvs_role` VALUES ('157', '107', '测试管理1', '1465798992', '1465798992');

-- ----------------------------
-- Table structure for gvs_role_privilege
-- ----------------------------
DROP TABLE IF EXISTS `gvs_role_privilege`;
CREATE TABLE `gvs_role_privilege` (
  `role_privilege_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '主键',
  `role_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '角色id',
  `privilege_id` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '权限id',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  PRIMARY KEY (`role_privilege_id`)
) ENGINE=InnoDB AUTO_INCREMENT=5159 DEFAULT CHARSET=utf8 COMMENT='用户角色关系表';

-- ----------------------------
-- Records of gvs_role_privilege
-- ----------------------------
INSERT INTO `gvs_role_privilege` VALUES ('1', '2', '1', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('2', '2', '2', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('3', '2', '7', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('4', '2', '8', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('5', '2', '4', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('6', '2', '9', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('7', '2', '3', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('8', '2', '10', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('9', '2', '5', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('10', '2', '11', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('11', '2', '6', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('12', '2', '12', '1402386197');
INSERT INTO `gvs_role_privilege` VALUES ('84', '1', '80', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('85', '1', '89', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('86', '1', '99', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('88', '1', '119', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('89', '1', '100', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('90', '1', '90', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('91', '1', '81', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('93', '1', '120', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('94', '1', '101', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('95', '1', '91', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('96', '1', '82', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('98', '1', '121', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('99', '1', '102', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('100', '1', '92', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('101', '1', '83', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('103', '1', '122', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('104', '1', '103', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('105', '1', '93', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('106', '1', '84', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('108', '1', '123', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('109', '1', '104', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('110', '1', '94', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('111', '1', '85', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('113', '1', '124', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('114', '1', '105', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('115', '1', '95', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('116', '1', '86', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('118', '1', '125', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('119', '1', '106', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('120', '1', '96', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('121', '1', '87', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('123', '1', '126', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('124', '1', '107', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('125', '1', '97', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('126', '1', '88', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('128', '1', '127', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('129', '1', '108', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('130', '1', '98', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('131', '1', '128', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('132', '1', '109', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('133', '1', '129', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('134', '1', '110', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('135', '1', '111', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('136', '1', '112', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('137', '1', '113', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('138', '1', '115', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('139', '1', '116', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('140', '1', '117', '1402386209');
INSERT INTO `gvs_role_privilege` VALUES ('144', '1', '139', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('146', '1', '140', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('148', '1', '141', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('150', '1', '142', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('152', '1', '143', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('154', '1', '144', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('156', '1', '145', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('157', '1', '146', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('158', '1', '147', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('159', '1', '148', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('160', '1', '149', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('161', '1', '150', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('162', '1', '151', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('163', '1', '152', '1402386212');
INSERT INTO `gvs_role_privilege` VALUES ('165', '1', '154', '1405499376');
INSERT INTO `gvs_role_privilege` VALUES ('347', '3', '1', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('348', '3', '2', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('349', '3', '7', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('350', '3', '8', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('351', '3', '4', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('352', '3', '9', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('353', '3', '3', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('354', '3', '10', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('355', '3', '5', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('356', '3', '11', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('357', '3', '6', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('358', '3', '12', '1406861126');
INSERT INTO `gvs_role_privilege` VALUES ('579', '1', '158', '1406866940');
INSERT INTO `gvs_role_privilege` VALUES ('608', '1', '177', '1406868052');
INSERT INTO `gvs_role_privilege` VALUES ('614', '1', '179', '1406869181');
INSERT INTO `gvs_role_privilege` VALUES ('620', '1', '180', '1406869184');
INSERT INTO `gvs_role_privilege` VALUES ('623', '1', '182', '1406869200');
INSERT INTO `gvs_role_privilege` VALUES ('906', '4', '1', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('907', '4', '2', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('908', '4', '7', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('909', '4', '8', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('910', '4', '4', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('911', '4', '9', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('912', '4', '3', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('913', '4', '10', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('914', '4', '5', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('915', '4', '11', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('916', '4', '6', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('917', '4', '12', '1406873591');
INSERT INTO `gvs_role_privilege` VALUES ('922', '3', '67', '1406873867');
INSERT INTO `gvs_role_privilege` VALUES ('923', '3', '13', '1406873867');
INSERT INTO `gvs_role_privilege` VALUES ('924', '3', '69', '1406873867');
INSERT INTO `gvs_role_privilege` VALUES ('925', '3', '68', '1406873867');
INSERT INTO `gvs_role_privilege` VALUES ('927', '3', '71', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('928', '3', '80', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('929', '3', '89', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('930', '3', '99', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('932', '3', '154', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('933', '3', '119', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('934', '3', '100', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('935', '3', '90', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('936', '3', '81', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('937', '3', '72', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('938', '3', '120', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('939', '3', '101', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('940', '3', '91', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('941', '3', '82', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('942', '3', '73', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('943', '3', '121', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('944', '3', '102', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('945', '3', '92', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('946', '3', '83', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('947', '3', '74', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('948', '3', '122', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('949', '3', '103', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('950', '3', '93', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('951', '3', '84', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('952', '3', '75', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('953', '3', '123', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('954', '3', '104', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('955', '3', '94', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('956', '3', '85', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('957', '3', '76', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('958', '3', '124', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('959', '3', '105', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('960', '3', '95', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('961', '3', '86', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('962', '3', '77', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('963', '3', '125', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('964', '3', '106', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('965', '3', '96', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('966', '3', '87', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('967', '3', '78', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('968', '3', '126', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('969', '3', '107', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('970', '3', '97', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('971', '3', '88', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('972', '3', '79', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('973', '3', '127', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('974', '3', '108', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('975', '3', '98', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('976', '3', '128', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('977', '3', '109', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('978', '3', '129', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('979', '3', '110', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('980', '3', '111', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('981', '3', '176', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('982', '3', '112', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('983', '3', '113', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('984', '3', '115', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('985', '3', '116', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('986', '3', '117', '1406873875');
INSERT INTO `gvs_role_privilege` VALUES ('987', '3', '131', '1406873892');
INSERT INTO `gvs_role_privilege` VALUES ('988', '3', '130', '1406873892');
INSERT INTO `gvs_role_privilege` VALUES ('989', '3', '132', '1406873892');
INSERT INTO `gvs_role_privilege` VALUES ('990', '3', '133', '1406873892');
INSERT INTO `gvs_role_privilege` VALUES ('991', '3', '134', '1406873892');
INSERT INTO `gvs_role_privilege` VALUES ('992', '3', '135', '1406873892');
INSERT INTO `gvs_role_privilege` VALUES ('993', '3', '136', '1406873892');
INSERT INTO `gvs_role_privilege` VALUES ('994', '3', '137', '1406873892');
INSERT INTO `gvs_role_privilege` VALUES ('996', '3', '156', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1000', '3', '179', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1001', '3', '178', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1002', '3', '177', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1003', '3', '158', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1004', '3', '157', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1005', '3', '190', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1006', '3', '165', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1008', '3', '164', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1010', '3', '184', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1011', '3', '180', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1012', '3', '185', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1013', '3', '183', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1014', '3', '175', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1015', '3', '182', '1406873896');
INSERT INTO `gvs_role_privilege` VALUES ('1017', '3', '186', '1406873906');
INSERT INTO `gvs_role_privilege` VALUES ('1032', '1', '176', '1406874992');
INSERT INTO `gvs_role_privilege` VALUES ('1035', '1', '131', '1406874995');
INSERT INTO `gvs_role_privilege` VALUES ('1037', '1', '132', '1406874995');
INSERT INTO `gvs_role_privilege` VALUES ('1038', '1', '133', '1406874995');
INSERT INTO `gvs_role_privilege` VALUES ('1039', '1', '134', '1406874995');
INSERT INTO `gvs_role_privilege` VALUES ('1040', '1', '135', '1406874995');
INSERT INTO `gvs_role_privilege` VALUES ('1041', '1', '136', '1406874995');
INSERT INTO `gvs_role_privilege` VALUES ('1042', '1', '137', '1406874995');
INSERT INTO `gvs_role_privilege` VALUES ('1046', '1', '164', '1406874999');
INSERT INTO `gvs_role_privilege` VALUES ('1048', '1', '184', '1406874999');
INSERT INTO `gvs_role_privilege` VALUES ('1049', '1', '185', '1406874999');
INSERT INTO `gvs_role_privilege` VALUES ('1050', '1', '183', '1406874999');
INSERT INTO `gvs_role_privilege` VALUES ('1051', '1', '175', '1406874999');
INSERT INTO `gvs_role_privilege` VALUES ('1052', '1', '192', '1406874999');
INSERT INTO `gvs_role_privilege` VALUES ('1056', '1', '189', '1406875000');
INSERT INTO `gvs_role_privilege` VALUES ('1057', '1', '190', '1406875000');
INSERT INTO `gvs_role_privilege` VALUES ('1059', '1', '153', '1406875007');
INSERT INTO `gvs_role_privilege` VALUES ('1062', '3', '192', '1406875013');
INSERT INTO `gvs_role_privilege` VALUES ('1068', '3', '193', '1406875528');
INSERT INTO `gvs_role_privilege` VALUES ('1071', '3', '181', '1406875543');
INSERT INTO `gvs_role_privilege` VALUES ('1074', '3', '189', '1406875552');
INSERT INTO `gvs_role_privilege` VALUES ('1080', '3', '191', '1406875612');
INSERT INTO `gvs_role_privilege` VALUES ('1113', '1', '193', '1406877181');
INSERT INTO `gvs_role_privilege` VALUES ('1116', '1', '194', '1406878138');
INSERT INTO `gvs_role_privilege` VALUES ('1119', '3', '194', '1406878154');
INSERT INTO `gvs_role_privilege` VALUES ('1146', '1', '195', '1407139850');
INSERT INTO `gvs_role_privilege` VALUES ('1149', '3', '195', '1407140655');
INSERT INTO `gvs_role_privilege` VALUES ('1155', '3', '196', '1407320372');
INSERT INTO `gvs_role_privilege` VALUES ('1156', '3', '187', '1407320372');
INSERT INTO `gvs_role_privilege` VALUES ('1158', '1', '181', '1407394262');
INSERT INTO `gvs_role_privilege` VALUES ('1161', '1', '186', '1407395193');
INSERT INTO `gvs_role_privilege` VALUES ('1167', '1', '165', '1407738853');
INSERT INTO `gvs_role_privilege` VALUES ('1170', '1', '178', '1407738959');
INSERT INTO `gvs_role_privilege` VALUES ('1173', '1', '157', '1407742907');
INSERT INTO `gvs_role_privilege` VALUES ('1174', '1', '156', '1407742907');
INSERT INTO `gvs_role_privilege` VALUES ('1176', '1', '198', '1407753175');
INSERT INTO `gvs_role_privilege` VALUES ('1181', '1', '200', '1408342359');
INSERT INTO `gvs_role_privilege` VALUES ('1182', '1', '201', '1408342359');
INSERT INTO `gvs_role_privilege` VALUES ('1183', '1', '202', '1408343777');
INSERT INTO `gvs_role_privilege` VALUES ('1186', '1', '203', '1408343778');
INSERT INTO `gvs_role_privilege` VALUES ('1250', '1', '191', '1408699375');
INSERT INTO `gvs_role_privilege` VALUES ('1253', '1', '196', '1408699375');
INSERT INTO `gvs_role_privilege` VALUES ('1265', '1', '71', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1267', '1', '72', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1268', '1', '73', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1269', '1', '74', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1270', '1', '75', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1271', '1', '76', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1272', '1', '77', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1273', '1', '78', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1274', '1', '79', '1408770102');
INSERT INTO `gvs_role_privilege` VALUES ('1278', '1', '208', '1408949221');
INSERT INTO `gvs_role_privilege` VALUES ('1299', '1', '205', '1409108253');
INSERT INTO `gvs_role_privilege` VALUES ('1303', '1', '206', '1409108255');
INSERT INTO `gvs_role_privilege` VALUES ('1374', '2', '209', '1409296344');
INSERT INTO `gvs_role_privilege` VALUES ('1377', '1', '207', '1409541725');
INSERT INTO `gvs_role_privilege` VALUES ('1380', '1', '209', '1409541725');
INSERT INTO `gvs_role_privilege` VALUES ('1383', '1', '210', '1409542084');
INSERT INTO `gvs_role_privilege` VALUES ('1386', '1', '211', '1409555154');
INSERT INTO `gvs_role_privilege` VALUES ('1389', '1', '212', '1409812229');
INSERT INTO `gvs_role_privilege` VALUES ('1392', '1', '213', '1409901886');
INSERT INTO `gvs_role_privilege` VALUES ('1395', '7', '7', '1409902024');
INSERT INTO `gvs_role_privilege` VALUES ('1397', '7', '8', '1409902024');
INSERT INTO `gvs_role_privilege` VALUES ('1398', '7', '9', '1409902024');
INSERT INTO `gvs_role_privilege` VALUES ('1399', '7', '10', '1409902024');
INSERT INTO `gvs_role_privilege` VALUES ('1400', '7', '11', '1409902024');
INSERT INTO `gvs_role_privilege` VALUES ('1401', '7', '12', '1409902024');
INSERT INTO `gvs_role_privilege` VALUES ('1402', '7', '2', '1409902025');
INSERT INTO `gvs_role_privilege` VALUES ('1403', '7', '1', '1409902025');
INSERT INTO `gvs_role_privilege` VALUES ('1404', '7', '4', '1409902025');
INSERT INTO `gvs_role_privilege` VALUES ('1405', '7', '3', '1409902025');
INSERT INTO `gvs_role_privilege` VALUES ('1406', '7', '5', '1409902025');
INSERT INTO `gvs_role_privilege` VALUES ('1407', '7', '6', '1409902025');
INSERT INTO `gvs_role_privilege` VALUES ('1410', '7', '200', '1409902043');
INSERT INTO `gvs_role_privilege` VALUES ('1411', '7', '201', '1409902043');
INSERT INTO `gvs_role_privilege` VALUES ('1412', '7', '213', '1409902043');
INSERT INTO `gvs_role_privilege` VALUES ('1413', '7', '212', '1409902043');
INSERT INTO `gvs_role_privilege` VALUES ('1414', '7', '202', '1409902043');
INSERT INTO `gvs_role_privilege` VALUES ('1415', '7', '203', '1409902043');
INSERT INTO `gvs_role_privilege` VALUES ('1416', '7', '187', '1409902044');
INSERT INTO `gvs_role_privilege` VALUES ('1418', '7', '189', '1409902044');
INSERT INTO `gvs_role_privilege` VALUES ('1419', '7', '190', '1409902044');
INSERT INTO `gvs_role_privilege` VALUES ('1420', '7', '191', '1409902044');
INSERT INTO `gvs_role_privilege` VALUES ('1421', '7', '196', '1409902044');
INSERT INTO `gvs_role_privilege` VALUES ('1422', '7', '208', '1409902044');
INSERT INTO `gvs_role_privilege` VALUES ('1423', '7', '163', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1425', '7', '195', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1426', '7', '194', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1427', '7', '193', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1428', '7', '165', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1429', '7', '164', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1430', '7', '181', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1431', '7', '185', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1432', '7', '183', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1433', '7', '175', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1434', '7', '192', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1435', '7', '186', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1436', '7', '207', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1437', '7', '210', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1438', '7', '211', '1409902047');
INSERT INTO `gvs_role_privilege` VALUES ('1439', '7', '156', '1409902048');
INSERT INTO `gvs_role_privilege` VALUES ('1441', '7', '179', '1409902048');
INSERT INTO `gvs_role_privilege` VALUES ('1442', '7', '178', '1409902048');
INSERT INTO `gvs_role_privilege` VALUES ('1443', '7', '177', '1409902048');
INSERT INTO `gvs_role_privilege` VALUES ('1444', '7', '158', '1409902048');
INSERT INTO `gvs_role_privilege` VALUES ('1445', '7', '157', '1409902048');
INSERT INTO `gvs_role_privilege` VALUES ('1446', '7', '180', '1409902048');
INSERT INTO `gvs_role_privilege` VALUES ('1447', '7', '204', '1409902050');
INSERT INTO `gvs_role_privilege` VALUES ('1449', '7', '206', '1409902050');
INSERT INTO `gvs_role_privilege` VALUES ('1450', '7', '205', '1409902050');
INSERT INTO `gvs_role_privilege` VALUES ('1451', '1', '215', '1409903339');
INSERT INTO `gvs_role_privilege` VALUES ('1454', '1', '214', '1409903340');
INSERT INTO `gvs_role_privilege` VALUES ('1457', '7', '214', '1409903354');
INSERT INTO `gvs_role_privilege` VALUES ('1460', '7', '215', '1409903355');
INSERT INTO `gvs_role_privilege` VALUES ('1463', '1', '216', '1409904996');
INSERT INTO `gvs_role_privilege` VALUES ('1464', '1', '199', '1409904996');
INSERT INTO `gvs_role_privilege` VALUES ('1466', '7', '216', '1409905032');
INSERT INTO `gvs_role_privilege` VALUES ('1467', '7', '199', '1409905032');
INSERT INTO `gvs_role_privilege` VALUES ('1468', '7', '155', '1409905032');
INSERT INTO `gvs_role_privilege` VALUES ('1469', '1', '217', '1409908651');
INSERT INTO `gvs_role_privilege` VALUES ('1472', '8', '1', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1473', '8', '2', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1474', '8', '7', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1475', '8', '8', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1476', '8', '4', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1477', '8', '9', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1478', '8', '3', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1479', '8', '10', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1480', '8', '5', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1481', '8', '11', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1482', '8', '6', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1483', '8', '12', '1410232875');
INSERT INTO `gvs_role_privilege` VALUES ('1529', '1', '218', '1410252882');
INSERT INTO `gvs_role_privilege` VALUES ('1544', '1', '220', '1410253191');
INSERT INTO `gvs_role_privilege` VALUES ('1547', '1', '219', '1410253192');
INSERT INTO `gvs_role_privilege` VALUES ('1550', '1', '221', '1410253946');
INSERT INTO `gvs_role_privilege` VALUES ('1553', '1', '222', '1410253947');
INSERT INTO `gvs_role_privilege` VALUES ('1559', '8', '221', '1410253957');
INSERT INTO `gvs_role_privilege` VALUES ('1565', '1', '223', '1410255989');
INSERT INTO `gvs_role_privilege` VALUES ('1577', '2', '221', '1410256055');
INSERT INTO `gvs_role_privilege` VALUES ('1592', '1', '225', '1410257659');
INSERT INTO `gvs_role_privilege` VALUES ('1595', '1', '224', '1410257659');
INSERT INTO `gvs_role_privilege` VALUES ('1596', '1', '204', '1410257659');
INSERT INTO `gvs_role_privilege` VALUES ('1598', '1', '226', '1411469897');
INSERT INTO `gvs_role_privilege` VALUES ('1601', '1', '227', '1411469897');
INSERT INTO `gvs_role_privilege` VALUES ('1604', '1', '197', '1411469902');
INSERT INTO `gvs_role_privilege` VALUES ('1605', '1', '138', '1411469902');
INSERT INTO `gvs_role_privilege` VALUES ('1606', '1', '130', '1411469902');
INSERT INTO `gvs_role_privilege` VALUES ('1610', '1', '230', '1413015654');
INSERT INTO `gvs_role_privilege` VALUES ('1613', '1', '229', '1413015656');
INSERT INTO `gvs_role_privilege` VALUES ('1614', '1', '187', '1413015656');
INSERT INTO `gvs_role_privilege` VALUES ('1616', '8', '118', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1618', '8', '154', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1619', '8', '119', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1620', '8', '120', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1621', '8', '121', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1622', '8', '122', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1623', '8', '123', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1624', '8', '124', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1625', '8', '228', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1626', '8', '125', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1627', '8', '126', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1628', '8', '127', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1629', '8', '128', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1630', '8', '129', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1631', '8', '198', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1632', '8', '217', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1633', '8', '176', '1413186430');
INSERT INTO `gvs_role_privilege` VALUES ('1634', '8', '99', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1635', '8', '70', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1636', '8', '100', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1637', '8', '101', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1638', '8', '102', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1639', '8', '103', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1640', '8', '104', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1641', '8', '105', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1642', '8', '106', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1643', '8', '107', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1644', '8', '108', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1645', '8', '109', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1646', '8', '110', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1647', '8', '111', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1648', '8', '112', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1649', '8', '113', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1650', '8', '115', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1651', '8', '116', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1652', '8', '117', '1413186432');
INSERT INTO `gvs_role_privilege` VALUES ('1706', '8', '155', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1707', '8', '204', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1708', '8', '163', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1709', '8', '156', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1710', '8', '199', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1711', '8', '187', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1712', '8', '225', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1713', '8', '224', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1714', '8', '206', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1715', '8', '200', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1716', '8', '195', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1717', '8', '194', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1718', '8', '193', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1719', '8', '189', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1720', '8', '179', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1721', '8', '178', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1722', '8', '177', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1723', '8', '158', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1724', '8', '157', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1725', '8', '201', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1726', '8', '190', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1727', '8', '165', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1728', '8', '213', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1729', '8', '205', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1730', '8', '191', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1731', '8', '164', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1732', '8', '214', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1733', '8', '212', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1734', '8', '196', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1735', '8', '222', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1736', '8', '226', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1737', '8', '219', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1738', '8', '181', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1739', '8', '227', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1740', '8', '223', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1741', '8', '220', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1742', '8', '215', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1743', '8', '218', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1744', '8', '180', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1745', '8', '185', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1746', '8', '183', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1747', '8', '175', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1748', '8', '230', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1749', '8', '202', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1750', '8', '192', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1751', '8', '186', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1752', '8', '208', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1753', '8', '203', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1754', '8', '229', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1755', '8', '216', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1756', '8', '207', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1757', '8', '210', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1758', '8', '211', '1413186438');
INSERT INTO `gvs_role_privilege` VALUES ('1873', '1', '6', '1414755006');
INSERT INTO `gvs_role_privilege` VALUES ('1876', '1', '4', '1414755018');
INSERT INTO `gvs_role_privilege` VALUES ('1879', '1', '3', '1414755030');
INSERT INTO `gvs_role_privilege` VALUES ('1900', '3', '198', '1418181523');
INSERT INTO `gvs_role_privilege` VALUES ('1903', '3', '217', '1418181524');
INSERT INTO `gvs_role_privilege` VALUES ('1906', '3', '244', '1418181525');
INSERT INTO `gvs_role_privilege` VALUES ('1907', '3', '118', '1418181525');
INSERT INTO `gvs_role_privilege` VALUES ('1908', '3', '70', '1418181525');
INSERT INTO `gvs_role_privilege` VALUES ('1909', '1', '249', '1421726642');
INSERT INTO `gvs_role_privilege` VALUES ('1912', '1', '244', '1423644996');
INSERT INTO `gvs_role_privilege` VALUES ('1915', '1', '251', '1423644996');
INSERT INTO `gvs_role_privilege` VALUES ('1925', '1', '246', '1430375145');
INSERT INTO `gvs_role_privilege` VALUES ('1926', '1', '247', '1430375145');
INSERT INTO `gvs_role_privilege` VALUES ('1927', '1', '248', '1430375145');
INSERT INTO `gvs_role_privilege` VALUES ('1928', '1', '250', '1430375145');
INSERT INTO `gvs_role_privilege` VALUES ('1940', '22', '2', '1432619489');
INSERT INTO `gvs_role_privilege` VALUES ('1942', '22', '4', '1432619489');
INSERT INTO `gvs_role_privilege` VALUES ('1943', '22', '3', '1432619489');
INSERT INTO `gvs_role_privilege` VALUES ('1944', '22', '5', '1432619489');
INSERT INTO `gvs_role_privilege` VALUES ('1945', '22', '6', '1432619489');
INSERT INTO `gvs_role_privilege` VALUES ('2013', '22', '7', '1432622929');
INSERT INTO `gvs_role_privilege` VALUES ('2014', '22', '1', '1432622929');
INSERT INTO `gvs_role_privilege` VALUES ('2015', '22', '8', '1432622929');
INSERT INTO `gvs_role_privilege` VALUES ('2016', '22', '9', '1432622929');
INSERT INTO `gvs_role_privilege` VALUES ('2093', '22', '293', '1433212302');
INSERT INTO `gvs_role_privilege` VALUES ('2096', '22', '294', '1433212303');
INSERT INTO `gvs_role_privilege` VALUES ('2223', '102', '163', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2224', '102', '155', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2225', '102', '312', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2226', '102', '195', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2227', '102', '194', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2228', '102', '193', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2229', '102', '165', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2230', '102', '164', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2231', '102', '181', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2232', '102', '185', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2233', '102', '183', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2234', '102', '175', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2235', '102', '230', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2236', '102', '297', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2237', '102', '192', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2238', '102', '186', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2239', '102', '207', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2240', '102', '210', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2241', '102', '211', '1435833310');
INSERT INTO `gvs_role_privilege` VALUES ('2242', '101', '163', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2243', '101', '155', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2244', '101', '312', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2245', '101', '195', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2246', '101', '194', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2247', '101', '193', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2248', '101', '165', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2249', '101', '164', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2250', '101', '181', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2251', '101', '185', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2252', '101', '183', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2253', '101', '175', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2254', '101', '230', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2255', '101', '297', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2256', '101', '192', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2257', '101', '186', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2258', '101', '207', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2259', '101', '210', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2260', '101', '211', '1435833332');
INSERT INTO `gvs_role_privilege` VALUES ('2261', '103', '163', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2262', '103', '155', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2263', '103', '312', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2264', '103', '195', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2265', '103', '194', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2266', '103', '193', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2267', '103', '165', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2268', '103', '164', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2269', '103', '181', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2270', '103', '185', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2271', '103', '183', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2272', '103', '175', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2273', '103', '230', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2274', '103', '297', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2275', '103', '192', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2276', '103', '186', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2277', '103', '207', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2278', '103', '210', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2279', '103', '211', '1435833339');
INSERT INTO `gvs_role_privilege` VALUES ('2281', '100', '156', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2282', '100', '269', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2283', '100', '199', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2285', '100', '204', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2286', '100', '265', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2287', '100', '295', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2288', '100', '187', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2289', '100', '312', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2290', '100', '306', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2291', '100', '299', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2292', '100', '270', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2293', '100', '267', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2294', '100', '266', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2295', '100', '225', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2296', '100', '224', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2297', '100', '206', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2298', '100', '200', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2299', '100', '195', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2300', '100', '194', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2301', '100', '193', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2302', '100', '189', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2303', '100', '179', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2304', '100', '178', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2305', '100', '177', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2306', '100', '158', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2307', '100', '157', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2308', '100', '296', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2309', '100', '271', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2310', '100', '201', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2311', '100', '190', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2312', '100', '165', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2313', '100', '300', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2314', '100', '298', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2315', '100', '213', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2316', '100', '205', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2317', '100', '191', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2318', '100', '164', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2319', '100', '214', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2320', '100', '212', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2321', '100', '196', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2322', '100', '222', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2323', '100', '226', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2324', '100', '219', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2325', '100', '181', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2326', '100', '227', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2327', '100', '223', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2328', '100', '220', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2329', '100', '215', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2330', '100', '218', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2331', '100', '180', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2332', '100', '185', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2333', '100', '183', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2334', '100', '175', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2335', '100', '230', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2336', '100', '297', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2337', '100', '202', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2338', '100', '192', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2339', '100', '186', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2340', '100', '208', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2341', '100', '203', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2342', '100', '229', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2343', '100', '216', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2344', '100', '207', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2345', '100', '210', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2346', '100', '211', '1435833369');
INSERT INTO `gvs_role_privilege` VALUES ('2348', '1', '256', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2350', '1', '262', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2352', '1', '289', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2353', '1', '263', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2354', '1', '260', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2355', '1', '257', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2356', '1', '288', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2357', '1', '264', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2358', '1', '261', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2359', '1', '258', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2361', '1', '279', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2362', '1', '275', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2363', '1', '280', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2364', '1', '276', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2365', '1', '274', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2366', '1', '281', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2367', '1', '277', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2368', '1', '272', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2369', '1', '285', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2370', '1', '284', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2371', '1', '283', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2372', '1', '273', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2373', '1', '286', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2374', '1', '278', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2375', '1', '313', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2376', '1', '314', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2377', '1', '268', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2378', '1', '282', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2379', '1', '291', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2380', '1', '292', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2381', '1', '301', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2382', '1', '302', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2383', '1', '303', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2384', '1', '304', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2385', '1', '307', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2386', '1', '308', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2387', '1', '309', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2388', '1', '310', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2389', '1', '315', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2390', '1', '318', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2391', '1', '319', '1438225472');
INSERT INTO `gvs_role_privilege` VALUES ('2392', '22', '318', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2396', '22', '256', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2398', '22', '262', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2399', '22', '287', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2400', '22', '289', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2401', '22', '263', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2402', '22', '260', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2403', '22', '257', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2404', '22', '288', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2405', '22', '264', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2406', '22', '261', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2407', '22', '258', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2408', '22', '290', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2409', '22', '279', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2410', '22', '275', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2411', '22', '280', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2412', '22', '276', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2413', '22', '274', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2414', '22', '281', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2415', '22', '277', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2416', '22', '272', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2417', '22', '285', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2418', '22', '284', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2419', '22', '283', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2420', '22', '273', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2421', '22', '286', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2422', '22', '278', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2423', '22', '313', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2424', '22', '314', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2425', '22', '268', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2426', '22', '282', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2427', '22', '291', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2428', '22', '292', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2429', '22', '301', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2430', '22', '302', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2431', '22', '303', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2432', '22', '304', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2433', '22', '307', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2434', '22', '308', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2435', '22', '309', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2436', '22', '310', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2437', '22', '315', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2438', '22', '318', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2440', '22', '320', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2441', '22', '321', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2442', '22', '322', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2443', '22', '323', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2444', '22', '324', '1438858121');
INSERT INTO `gvs_role_privilege` VALUES ('2445', '22', '319', '1438858122');
INSERT INTO `gvs_role_privilege` VALUES ('2448', '22', '325', '1438931516');
INSERT INTO `gvs_role_privilege` VALUES ('2451', '22', '326', '1438933725');
INSERT INTO `gvs_role_privilege` VALUES ('2454', '22', '328', '1438947376');
INSERT INTO `gvs_role_privilege` VALUES ('2457', '22', '329', '1438947553');
INSERT INTO `gvs_role_privilege` VALUES ('2460', '22', '330', '1439371846');
INSERT INTO `gvs_role_privilege` VALUES ('2463', '22', '335', '1440066907');
INSERT INTO `gvs_role_privilege` VALUES ('2466', '22', '336', '1440066907');
INSERT INTO `gvs_role_privilege` VALUES ('2467', '22', '259', '1440066907');
INSERT INTO `gvs_role_privilege` VALUES ('2468', '22', '255', '1440066907');
INSERT INTO `gvs_role_privilege` VALUES ('2469', '27', '1', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2470', '27', '2', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2471', '27', '7', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2472', '27', '8', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2473', '27', '4', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2474', '27', '9', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2475', '27', '3', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2476', '27', '10', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2477', '27', '5', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2478', '27', '11', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2479', '27', '6', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2480', '27', '12', '1441955819');
INSERT INTO `gvs_role_privilege` VALUES ('2488', '27', '342', '1441955830');
INSERT INTO `gvs_role_privilege` VALUES ('2489', '27', '341', '1441955831');
INSERT INTO `gvs_role_privilege` VALUES ('2490', '27', '340', '1441955831');
INSERT INTO `gvs_role_privilege` VALUES ('2491', '27', '339', '1441955831');
INSERT INTO `gvs_role_privilege` VALUES ('2499', '1', '59', '1449128785');
INSERT INTO `gvs_role_privilege` VALUES ('2504', '1', '60', '1449128785');
INSERT INTO `gvs_role_privilege` VALUES ('2511', '1', '61', '1449128785');
INSERT INTO `gvs_role_privilege` VALUES ('2519', '1', '62', '1449128785');
INSERT INTO `gvs_role_privilege` VALUES ('2526', '1', '63', '1449128785');
INSERT INTO `gvs_role_privilege` VALUES ('2533', '1', '64', '1449128785');
INSERT INTO `gvs_role_privilege` VALUES ('2540', '1', '65', '1449128785');
INSERT INTO `gvs_role_privilege` VALUES ('2547', '1', '66', '1449128785');
INSERT INTO `gvs_role_privilege` VALUES ('2558', '1', '340', '1449128792');
INSERT INTO `gvs_role_privilege` VALUES ('2560', '1', '341', '1449128792');
INSERT INTO `gvs_role_privilege` VALUES ('2561', '1', '342', '1449128792');
INSERT INTO `gvs_role_privilege` VALUES ('2562', '1', '234', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2563', '1', '240', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2564', '1', '235', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2565', '1', '252', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2566', '1', '236', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2567', '1', '253', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2568', '1', '242', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2569', '1', '241', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2570', '1', '254', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2571', '1', '237', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2572', '1', '239', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2573', '1', '238', '1449128796');
INSERT INTO `gvs_role_privilege` VALUES ('2574', '1', '312', '1449128801');
INSERT INTO `gvs_role_privilege` VALUES ('2580', '1', '271', '1449128807');
INSERT INTO `gvs_role_privilege` VALUES ('2581', '1', '270', '1449128808');
INSERT INTO `gvs_role_privilege` VALUES ('2582', '1', '269', '1449128808');
INSERT INTO `gvs_role_privilege` VALUES ('2584', '1', '265', '1449128815');
INSERT INTO `gvs_role_privilege` VALUES ('2586', '1', '306', '1449128815');
INSERT INTO `gvs_role_privilege` VALUES ('2587', '1', '267', '1449128815');
INSERT INTO `gvs_role_privilege` VALUES ('2588', '1', '266', '1449128815');
INSERT INTO `gvs_role_privilege` VALUES ('2589', '1', '295', '1449128819');
INSERT INTO `gvs_role_privilege` VALUES ('2591', '1', '316', '1449128819');
INSERT INTO `gvs_role_privilege` VALUES ('2592', '1', '296', '1449128819');
INSERT INTO `gvs_role_privilege` VALUES ('2593', '1', '299', '1449128819');
INSERT INTO `gvs_role_privilege` VALUES ('2594', '1', '300', '1449128819');
INSERT INTO `gvs_role_privilege` VALUES ('2595', '1', '298', '1449128819');
INSERT INTO `gvs_role_privilege` VALUES ('2596', '1', '325', '1449128823');
INSERT INTO `gvs_role_privilege` VALUES ('2599', '1', '320', '1449128829');
INSERT INTO `gvs_role_privilege` VALUES ('2602', '1', '321', '1449128830');
INSERT INTO `gvs_role_privilege` VALUES ('2605', '1', '322', '1449128830');
INSERT INTO `gvs_role_privilege` VALUES ('2608', '1', '323', '1449128831');
INSERT INTO `gvs_role_privilege` VALUES ('2611', '1', '324', '1449128831');
INSERT INTO `gvs_role_privilege` VALUES ('2614', '1', '329', '1449128832');
INSERT INTO `gvs_role_privilege` VALUES ('2617', '1', '328', '1449128832');
INSERT INTO `gvs_role_privilege` VALUES ('2620', '1', '330', '1449128833');
INSERT INTO `gvs_role_privilege` VALUES ('2623', '1', '335', '1449128834');
INSERT INTO `gvs_role_privilege` VALUES ('2626', '1', '336', '1449128835');
INSERT INTO `gvs_role_privilege` VALUES ('2629', '1', '337', '1449128836');
INSERT INTO `gvs_role_privilege` VALUES ('2632', '1', '326', '1449128850');
INSERT INTO `gvs_role_privilege` VALUES ('2633', '1', '259', '1449128850');
INSERT INTO `gvs_role_privilege` VALUES ('2635', '1', '297', '1449128869');
INSERT INTO `gvs_role_privilege` VALUES ('2638', '1', '245', '1449128887');
INSERT INTO `gvs_role_privilege` VALUES ('2641', '1', '228', '1449128888');
INSERT INTO `gvs_role_privilege` VALUES ('2644', '1', '331', '1449128897');
INSERT INTO `gvs_role_privilege` VALUES ('2646', '1', '334', '1449128897');
INSERT INTO `gvs_role_privilege` VALUES ('2647', '1', '332', '1449128897');
INSERT INTO `gvs_role_privilege` VALUES ('2648', '1', '333', '1449128897');
INSERT INTO `gvs_role_privilege` VALUES ('2649', '1', '8', '1449128924');
INSERT INTO `gvs_role_privilege` VALUES ('2652', '1', '9', '1449128925');
INSERT INTO `gvs_role_privilege` VALUES ('2655', '1', '10', '1449128925');
INSERT INTO `gvs_role_privilege` VALUES ('2658', '1', '11', '1449128926');
INSERT INTO `gvs_role_privilege` VALUES ('2661', '1', '12', '1449128929');
INSERT INTO `gvs_role_privilege` VALUES ('2662', '1', '7', '1449128929');
INSERT INTO `gvs_role_privilege` VALUES ('2664', '1', '5', '1449128938');
INSERT INTO `gvs_role_privilege` VALUES ('2665', '1', '2', '1449128938');
INSERT INTO `gvs_role_privilege` VALUES ('2666', '1', '1', '1449128938');
INSERT INTO `gvs_role_privilege` VALUES ('2667', '1', '290', '1449129011');
INSERT INTO `gvs_role_privilege` VALUES ('2668', '1', '287', '1449129011');
INSERT INTO `gvs_role_privilege` VALUES ('2669', '1', '255', '1449129011');
INSERT INTO `gvs_role_privilege` VALUES ('2673', '1', '344', '1452674667');
INSERT INTO `gvs_role_privilege` VALUES ('2676', '100', '345', '1452674694');
INSERT INTO `gvs_role_privilege` VALUES ('2679', '100', '344', '1452674694');
INSERT INTO `gvs_role_privilege` VALUES ('2682', '27', '163', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2684', '27', '345', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2685', '27', '344', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2686', '27', '194', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2687', '27', '164', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2688', '27', '312', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2689', '27', '165', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2690', '27', '181', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2691', '27', '185', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2692', '27', '183', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2693', '27', '297', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2694', '27', '192', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2695', '27', '186', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2696', '27', '207', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2697', '27', '210', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2698', '27', '211', '1453101877');
INSERT INTO `gvs_role_privilege` VALUES ('2699', '27', '156', '1453101883');
INSERT INTO `gvs_role_privilege` VALUES ('2701', '27', '179', '1453101883');
INSERT INTO `gvs_role_privilege` VALUES ('2702', '27', '178', '1453101883');
INSERT INTO `gvs_role_privilege` VALUES ('2703', '27', '177', '1453101883');
INSERT INTO `gvs_role_privilege` VALUES ('2704', '27', '158', '1453101883');
INSERT INTO `gvs_role_privilege` VALUES ('2705', '27', '157', '1453101883');
INSERT INTO `gvs_role_privilege` VALUES ('2706', '27', '180', '1453101883');
INSERT INTO `gvs_role_privilege` VALUES ('2707', '27', '269', '1453101884');
INSERT INTO `gvs_role_privilege` VALUES ('2709', '27', '270', '1453101884');
INSERT INTO `gvs_role_privilege` VALUES ('2710', '27', '271', '1453101884');
INSERT INTO `gvs_role_privilege` VALUES ('2711', '27', '199', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2713', '27', '200', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2714', '27', '201', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2715', '27', '213', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2716', '27', '214', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2717', '27', '212', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2718', '27', '215', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2719', '27', '202', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2720', '27', '203', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2721', '27', '216', '1453101885');
INSERT INTO `gvs_role_privilege` VALUES ('2722', '27', '204', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2723', '27', '155', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2724', '27', '225', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2725', '27', '224', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2726', '27', '206', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2727', '27', '205', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2728', '27', '222', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2729', '27', '219', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2730', '27', '223', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2731', '27', '220', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2732', '27', '218', '1453101888');
INSERT INTO `gvs_role_privilege` VALUES ('2736', '1', '346', '1453105667');
INSERT INTO `gvs_role_privilege` VALUES ('2739', '100', '347', '1453105675');
INSERT INTO `gvs_role_privilege` VALUES ('2742', '100', '346', '1453105677');
INSERT INTO `gvs_role_privilege` VALUES ('2743', '100', '163', '1453105677');
INSERT INTO `gvs_role_privilege` VALUES ('2744', '100', '155', '1453105677');
INSERT INTO `gvs_role_privilege` VALUES ('2745', '3', '348', '1453686033');
INSERT INTO `gvs_role_privilege` VALUES ('2746', '3', '163', '1453686033');
INSERT INTO `gvs_role_privilege` VALUES ('2747', '3', '155', '1453686033');
INSERT INTO `gvs_role_privilege` VALUES ('2748', '1', '348', '1453687011');
INSERT INTO `gvs_role_privilege` VALUES ('2749', '1', '163', '1453687011');
INSERT INTO `gvs_role_privilege` VALUES ('2750', '1', '155', '1453687011');
INSERT INTO `gvs_role_privilege` VALUES ('2754', '1', '352', '1454408092');
INSERT INTO `gvs_role_privilege` VALUES ('2757', '1', '350', '1454408094');
INSERT INTO `gvs_role_privilege` VALUES ('2764', '1', '118', '1454408270');
INSERT INTO `gvs_role_privilege` VALUES ('2765', '1', '70', '1454408270');
INSERT INTO `gvs_role_privilege` VALUES ('2766', '104', '1', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2767', '104', '2', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2768', '104', '7', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2769', '104', '8', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2770', '104', '4', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2771', '104', '9', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2772', '104', '3', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2773', '104', '10', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2774', '104', '5', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2775', '104', '11', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2776', '104', '6', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2777', '104', '12', '1457079576');
INSERT INTO `gvs_role_privilege` VALUES ('2779', '107', '1', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2781', '107', '2', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2783', '107', '7', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2785', '107', '8', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2787', '107', '4', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2789', '107', '9', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2791', '107', '3', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2793', '107', '10', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2795', '107', '5', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2797', '107', '11', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2799', '107', '6', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2801', '107', '12', '1457581762');
INSERT INTO `gvs_role_privilege` VALUES ('2919', '109', '1', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2921', '109', '2', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2923', '109', '7', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2925', '109', '8', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2927', '109', '4', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2929', '109', '9', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2931', '109', '3', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2933', '109', '10', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2935', '109', '5', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2937', '109', '11', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2939', '109', '6', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('2941', '109', '12', '1457581833');
INSERT INTO `gvs_role_privilege` VALUES ('3245', '117', '8', '1458641110');
INSERT INTO `gvs_role_privilege` VALUES ('3247', '117', '4', '1458641110');
INSERT INTO `gvs_role_privilege` VALUES ('3251', '117', '3', '1458641110');
INSERT INTO `gvs_role_privilege` VALUES ('3253', '117', '10', '1458641110');
INSERT INTO `gvs_role_privilege` VALUES ('3255', '117', '5', '1458641110');
INSERT INTO `gvs_role_privilege` VALUES ('3257', '117', '11', '1458641110');
INSERT INTO `gvs_role_privilege` VALUES ('3261', '117', '12', '1458641110');
INSERT INTO `gvs_role_privilege` VALUES ('3557', '117', '30', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3559', '117', '67', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3561', '117', '38', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3565', '117', '166', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3583', '117', '167', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3585', '117', '69', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3587', '117', '68', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3589', '117', '51', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3591', '117', '39', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3593', '117', '31', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3595', '117', '23', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3597', '117', '15', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3599', '117', '168', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3601', '117', '52', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3603', '117', '40', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3605', '117', '32', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3607', '117', '24', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3609', '117', '16', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3611', '117', '338', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3613', '117', '169', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3615', '117', '53', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3617', '117', '41', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3619', '117', '33', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3625', '117', '170', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3627', '117', '54', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3629', '117', '42', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3631', '117', '34', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3637', '117', '171', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3639', '117', '55', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3641', '117', '43', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3643', '117', '35', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3645', '117', '27', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3647', '117', '19', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3649', '117', '172', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3651', '117', '56', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3653', '117', '44', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3655', '117', '36', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3657', '117', '28', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3659', '117', '20', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3661', '117', '173', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3663', '117', '57', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3665', '117', '45', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3667', '117', '37', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3671', '117', '21', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3673', '117', '58', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3675', '117', '46', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3677', '117', '47', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3679', '117', '48', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3681', '117', '49', '1458871652');
INSERT INTO `gvs_role_privilege` VALUES ('3825', '107', '14', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3829', '107', '30', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3831', '107', '67', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3833', '107', '38', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3837', '107', '166', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3839', '107', '375', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3841', '107', '373', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3843', '107', '371', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3845', '107', '369', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3847', '107', '367', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3849', '107', '365', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3851', '107', '363', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3853', '107', '361', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3855', '107', '357', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3857', '107', '355', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3859', '107', '353', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3861', '107', '351', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3863', '107', '349', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3865', '107', '347', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3867', '107', '345', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3869', '107', '343', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3871', '107', '167', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3873', '107', '69', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3875', '107', '68', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3877', '107', '51', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3879', '107', '39', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3881', '107', '31', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3883', '107', '23', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3885', '107', '15', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3887', '107', '168', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3889', '107', '52', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3891', '107', '40', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3893', '107', '32', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3895', '107', '24', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3897', '107', '16', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3899', '107', '338', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3901', '107', '169', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3903', '107', '53', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3905', '107', '41', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3907', '107', '33', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3909', '107', '25', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3911', '107', '17', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3913', '107', '170', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3915', '107', '54', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3917', '107', '42', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3919', '107', '34', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3921', '107', '26', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3923', '107', '18', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3925', '107', '171', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3927', '107', '55', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3929', '107', '43', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3931', '107', '35', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3933', '107', '27', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3935', '107', '19', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3937', '107', '172', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3939', '107', '56', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3941', '107', '44', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3943', '107', '36', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3945', '107', '28', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3947', '107', '20', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3949', '107', '173', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3951', '107', '57', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3953', '107', '45', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3955', '107', '37', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3957', '107', '29', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3959', '107', '21', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3961', '107', '58', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3963', '107', '46', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3965', '107', '47', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3967', '107', '48', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3969', '107', '49', '1458879672');
INSERT INTO `gvs_role_privilege` VALUES ('3975', '117', '375', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3977', '117', '373', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3979', '117', '371', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3981', '117', '369', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3983', '117', '367', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3985', '117', '365', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3987', '117', '363', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3989', '117', '361', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3991', '117', '357', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3993', '117', '355', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3995', '117', '353', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3997', '117', '351', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('3999', '117', '349', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('4001', '117', '347', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('4003', '117', '345', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('4005', '117', '343', '1458879706');
INSERT INTO `gvs_role_privilege` VALUES ('4047', '117', '397', '1460430768');
INSERT INTO `gvs_role_privilege` VALUES ('4053', '117', '399', '1460619067');
INSERT INTO `gvs_role_privilege` VALUES ('4055', '117', '359', '1460619067');
INSERT INTO `gvs_role_privilege` VALUES ('4059', '107', '399', '1460625070');
INSERT INTO `gvs_role_privilege` VALUES ('4061', '107', '359', '1460625070');
INSERT INTO `gvs_role_privilege` VALUES ('4099', '107', '395', '1462961767');
INSERT INTO `gvs_role_privilege` VALUES ('4101', '107', '403', '1462961767');
INSERT INTO `gvs_role_privilege` VALUES ('4103', '107', '405', '1462961767');
INSERT INTO `gvs_role_privilege` VALUES ('4105', '107', '407', '1462961767');
INSERT INTO `gvs_role_privilege` VALUES ('4135', '117', '417', '1463020109');
INSERT INTO `gvs_role_privilege` VALUES ('4137', '117', '415', '1463020109');
INSERT INTO `gvs_role_privilege` VALUES ('4139', '117', '413', '1463020109');
INSERT INTO `gvs_role_privilege` VALUES ('4141', '117', '411', '1463020109');
INSERT INTO `gvs_role_privilege` VALUES ('4143', '117', '409', '1463020109');
INSERT INTO `gvs_role_privilege` VALUES ('4147', '117', '381', '1463020109');
INSERT INTO `gvs_role_privilege` VALUES ('4149', '117', '383', '1463020109');
INSERT INTO `gvs_role_privilege` VALUES ('4157', '117', '423', '1463020983');
INSERT INTO `gvs_role_privilege` VALUES ('4169', '117', '425', '1463021199');
INSERT INTO `gvs_role_privilege` VALUES ('4175', '107', '377', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4177', '107', '379', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4179', '107', '425', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4181', '107', '423', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4183', '107', '421', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4185', '107', '419', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4187', '107', '417', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4189', '107', '415', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4191', '107', '413', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4193', '107', '411', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4195', '107', '409', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4197', '107', '401', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4199', '107', '381', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4201', '107', '383', '1463021231');
INSERT INTO `gvs_role_privilege` VALUES ('4483', '117', '419', '1463044121');
INSERT INTO `gvs_role_privilege` VALUES ('4501', '117', '427', '1463071691');
INSERT INTO `gvs_role_privilege` VALUES ('4507', '117', '429', '1463071707');
INSERT INTO `gvs_role_privilege` VALUES ('4509', '117', '50', '1463071707');
INSERT INTO `gvs_role_privilege` VALUES ('4519', '107', '431', '1463072392');
INSERT INTO `gvs_role_privilege` VALUES ('4521', '107', '393', '1463072392');
INSERT INTO `gvs_role_privilege` VALUES ('4525', '117', '29', '1463393908');
INSERT INTO `gvs_role_privilege` VALUES ('4531', '107', '427', '1463394831');
INSERT INTO `gvs_role_privilege` VALUES ('4533', '107', '22', '1463394831');
INSERT INTO `gvs_role_privilege` VALUES ('4537', '107', '429', '1463394847');
INSERT INTO `gvs_role_privilege` VALUES ('4539', '107', '50', '1463394847');
INSERT INTO `gvs_role_privilege` VALUES ('4541', '107', '13', '1463394847');
INSERT INTO `gvs_role_privilege` VALUES ('4566', '117', '421', '1463627720');
INSERT INTO `gvs_role_privilege` VALUES ('4569', '117', '401', '1463627723');
INSERT INTO `gvs_role_privilege` VALUES ('4581', '117', '9', '1463974295');
INSERT INTO `gvs_role_privilege` VALUES ('4582', '117', '7', '1463974295');
INSERT INTO `gvs_role_privilege` VALUES ('4584', '117', '6', '1463974521');
INSERT INTO `gvs_role_privilege` VALUES ('4585', '117', '2', '1463974521');
INSERT INTO `gvs_role_privilege` VALUES ('4586', '117', '1', '1463974521');
INSERT INTO `gvs_role_privilege` VALUES ('4587', '117', '17', '1463974523');
INSERT INTO `gvs_role_privilege` VALUES ('4590', '117', '18', '1463974524');
INSERT INTO `gvs_role_privilege` VALUES ('4591', '117', '14', '1463974524');
INSERT INTO `gvs_role_privilege` VALUES ('4593', '117', '436', '1464257617');
INSERT INTO `gvs_role_privilege` VALUES ('4596', '117', '439', '1465188728');
INSERT INTO `gvs_role_privilege` VALUES ('4599', '117', '437', '1465188729');
INSERT INTO `gvs_role_privilege` VALUES ('4602', '117', '438', '1465188729');
INSERT INTO `gvs_role_privilege` VALUES ('4605', '117', '440', '1465189750');
INSERT INTO `gvs_role_privilege` VALUES ('4608', '117', '25', '1465196554');
INSERT INTO `gvs_role_privilege` VALUES ('4611', '117', '26', '1465199838');
INSERT INTO `gvs_role_privilege` VALUES ('4612', '117', '22', '1465199838');
INSERT INTO `gvs_role_privilege` VALUES ('4614', '117', '441', '1465357105');
INSERT INTO `gvs_role_privilege` VALUES ('4623', '156', '7', '1465797011');
INSERT INTO `gvs_role_privilege` VALUES ('4625', '156', '8', '1465797011');
INSERT INTO `gvs_role_privilege` VALUES ('4626', '156', '9', '1465797011');
INSERT INTO `gvs_role_privilege` VALUES ('4627', '156', '10', '1465797011');
INSERT INTO `gvs_role_privilege` VALUES ('4628', '156', '11', '1465797011');
INSERT INTO `gvs_role_privilege` VALUES ('4629', '156', '12', '1465797011');
INSERT INTO `gvs_role_privilege` VALUES ('4630', '156', '13', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4631', '156', '359', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4632', '156', '14', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4633', '156', '22', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4634', '156', '30', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4635', '156', '67', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4636', '156', '38', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4637', '156', '50', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4638', '156', '166', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4639', '156', '393', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4640', '156', '429', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4641', '156', '427', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4642', '156', '375', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4643', '156', '373', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4644', '156', '371', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4645', '156', '369', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4646', '156', '367', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4647', '156', '365', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4648', '156', '363', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4649', '156', '361', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4650', '156', '357', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4651', '156', '355', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4652', '156', '353', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4653', '156', '351', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4654', '156', '349', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4655', '156', '347', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4656', '156', '345', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4657', '156', '343', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4658', '156', '167', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4659', '156', '69', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4660', '156', '68', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4661', '156', '51', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4662', '156', '39', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4663', '156', '31', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4664', '156', '23', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4665', '156', '15', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4666', '156', '168', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4667', '156', '52', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4668', '156', '40', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4669', '156', '32', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4670', '156', '24', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4671', '156', '16', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4672', '156', '395', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4673', '156', '338', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4674', '156', '169', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4675', '156', '53', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4676', '156', '41', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4677', '156', '33', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4678', '156', '25', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4679', '156', '17', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4680', '156', '399', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4681', '156', '170', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4682', '156', '54', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4683', '156', '42', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4684', '156', '34', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4685', '156', '26', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4686', '156', '18', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4687', '156', '403', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4688', '156', '171', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4689', '156', '55', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4690', '156', '43', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4691', '156', '35', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4692', '156', '27', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4693', '156', '19', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4694', '156', '405', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4695', '156', '172', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4696', '156', '56', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4697', '156', '44', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4698', '156', '36', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4699', '156', '28', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4700', '156', '20', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4701', '156', '433', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4702', '156', '407', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4703', '156', '173', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4704', '156', '57', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4705', '156', '45', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4706', '156', '37', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4707', '156', '29', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4708', '156', '21', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4709', '156', '431', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4710', '156', '58', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4711', '156', '46', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4712', '156', '47', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4713', '156', '48', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4714', '156', '49', '1465797014');
INSERT INTO `gvs_role_privilege` VALUES ('4715', '156', '377', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4716', '156', '379', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4717', '156', '440', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4718', '156', '439', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4719', '156', '438', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4720', '156', '437', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4721', '156', '425', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4722', '156', '423', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4723', '156', '421', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4724', '156', '419', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4725', '156', '417', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4726', '156', '415', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4727', '156', '413', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4728', '156', '411', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4729', '156', '409', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4730', '156', '401', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4731', '156', '381', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4732', '156', '383', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4733', '156', '441', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4734', '156', '436', '1465797019');
INSERT INTO `gvs_role_privilege` VALUES ('4738', '156', '4', '1465798836');
INSERT INTO `gvs_role_privilege` VALUES ('4739', '156', '2', '1465798836');
INSERT INTO `gvs_role_privilege` VALUES ('4740', '156', '1', '1465798836');
INSERT INTO `gvs_role_privilege` VALUES ('4741', '157', '1', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4742', '157', '2', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4743', '157', '7', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4744', '157', '8', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4745', '157', '4', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4746', '157', '9', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4747', '157', '3', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4748', '157', '10', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4749', '157', '5', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4750', '157', '11', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4751', '157', '6', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4752', '157', '12', '1466562126');
INSERT INTO `gvs_role_privilege` VALUES ('4754', '157', '359', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4755', '157', '14', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4756', '157', '22', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4757', '157', '30', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4758', '157', '67', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4759', '157', '38', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4760', '157', '50', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4761', '157', '166', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4763', '157', '429', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4764', '157', '427', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4765', '157', '375', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4766', '157', '373', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4767', '157', '371', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4768', '157', '369', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4769', '157', '367', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4770', '157', '365', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4771', '157', '363', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4772', '157', '361', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4773', '157', '357', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4774', '157', '355', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4775', '157', '353', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4776', '157', '351', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4777', '157', '349', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4778', '157', '347', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4779', '157', '345', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4780', '157', '343', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4781', '157', '167', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4782', '157', '69', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4783', '157', '68', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4784', '157', '51', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4785', '157', '39', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4786', '157', '31', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4787', '157', '23', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4788', '157', '15', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4789', '157', '168', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4790', '157', '52', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4791', '157', '40', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4792', '157', '32', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4793', '157', '24', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4794', '157', '16', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4796', '157', '338', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4797', '157', '169', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4798', '157', '53', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4799', '157', '41', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4800', '157', '33', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4801', '157', '25', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4802', '157', '17', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4803', '157', '399', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4804', '157', '170', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4805', '157', '54', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4806', '157', '42', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4807', '157', '34', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4808', '157', '26', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4809', '157', '18', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4811', '157', '171', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4812', '157', '55', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4813', '157', '43', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4814', '157', '35', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4815', '157', '27', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4816', '157', '19', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4818', '157', '172', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4819', '157', '56', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4820', '157', '44', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4821', '157', '36', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4822', '157', '28', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4823', '157', '20', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4826', '157', '173', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4827', '157', '57', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4828', '157', '45', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4829', '157', '37', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4830', '157', '29', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4831', '157', '21', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4833', '157', '58', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4834', '157', '46', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4835', '157', '47', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4836', '157', '48', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4837', '157', '49', '1466562127');
INSERT INTO `gvs_role_privilege` VALUES ('4838', '157', '377', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4839', '157', '379', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4840', '157', '440', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4841', '157', '439', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4842', '157', '438', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4843', '157', '437', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4844', '157', '425', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4845', '157', '423', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4846', '157', '421', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4847', '157', '419', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4848', '157', '417', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4849', '157', '415', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4850', '157', '413', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4851', '157', '411', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4852', '157', '409', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4853', '157', '401', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4854', '157', '381', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4855', '157', '383', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4856', '157', '441', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4857', '157', '436', '1466562131');
INSERT INTO `gvs_role_privilege` VALUES ('4859', '1', '359', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4860', '1', '14', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4861', '1', '22', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4862', '1', '30', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4863', '1', '67', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4864', '1', '38', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4865', '1', '50', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4866', '1', '166', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4868', '1', '429', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4869', '1', '427', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4870', '1', '375', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4871', '1', '373', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4872', '1', '371', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4873', '1', '369', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4874', '1', '367', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4875', '1', '365', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4876', '1', '363', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4877', '1', '361', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4878', '1', '357', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4879', '1', '355', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4880', '1', '353', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4881', '1', '351', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4882', '1', '349', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4883', '1', '347', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4884', '1', '345', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4885', '1', '343', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4886', '1', '167', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4887', '1', '69', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4888', '1', '68', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4889', '1', '51', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4890', '1', '39', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4891', '1', '31', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4892', '1', '23', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4893', '1', '15', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4894', '1', '168', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4895', '1', '52', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4896', '1', '40', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4897', '1', '32', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4898', '1', '24', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4899', '1', '16', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4901', '1', '338', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4902', '1', '169', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4903', '1', '53', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4904', '1', '41', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4905', '1', '33', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4906', '1', '25', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4907', '1', '17', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4908', '1', '399', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4909', '1', '170', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4910', '1', '54', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4911', '1', '42', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4912', '1', '34', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4913', '1', '26', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4914', '1', '18', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4916', '1', '171', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4917', '1', '55', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4918', '1', '43', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4919', '1', '35', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4920', '1', '27', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4921', '1', '19', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4923', '1', '172', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4924', '1', '56', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4925', '1', '44', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4926', '1', '36', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4927', '1', '28', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4928', '1', '20', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4931', '1', '173', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4932', '1', '57', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4933', '1', '45', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4934', '1', '37', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4935', '1', '29', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4936', '1', '21', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4938', '1', '58', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4939', '1', '46', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4940', '1', '47', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4941', '1', '48', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4942', '1', '49', '1466591375');
INSERT INTO `gvs_role_privilege` VALUES ('4945', '1', '440', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4946', '1', '439', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4947', '1', '438', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4948', '1', '437', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4949', '1', '425', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4950', '1', '423', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4951', '1', '421', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4952', '1', '419', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4953', '1', '417', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4954', '1', '415', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4955', '1', '413', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4956', '1', '411', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4957', '1', '409', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4958', '1', '401', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4959', '1', '381', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4960', '1', '383', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4961', '1', '441', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4962', '1', '436', '1466591385');
INSERT INTO `gvs_role_privilege` VALUES ('4963', '2', '22', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4964', '2', '13', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4965', '2', '427', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4966', '2', '23', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4967', '2', '24', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4968', '2', '25', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4969', '2', '26', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4970', '2', '27', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4971', '2', '28', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4972', '2', '29', '1466591428');
INSERT INTO `gvs_role_privilege` VALUES ('4995', '157', '442', '1468478564');
INSERT INTO `gvs_role_privilege` VALUES ('4996', '157', '13', '1468478564');
INSERT INTO `gvs_role_privilege` VALUES ('4997', '157', '443', '1468478564');
INSERT INTO `gvs_role_privilege` VALUES ('4998', '157', '444', '1468478564');
INSERT INTO `gvs_role_privilege` VALUES ('4999', '117', '443', '1468818178');
INSERT INTO `gvs_role_privilege` VALUES ('5002', '117', '444', '1468818179');
INSERT INTO `gvs_role_privilege` VALUES ('5005', '117', '445', '1468818179');
INSERT INTO `gvs_role_privilege` VALUES ('5008', '117', '446', '1468818180');
INSERT INTO `gvs_role_privilege` VALUES ('5011', '117', '447', '1468818181');
INSERT INTO `gvs_role_privilege` VALUES ('5014', '117', '448', '1468818181');
INSERT INTO `gvs_role_privilege` VALUES ('5015', '117', '442', '1468818181');
INSERT INTO `gvs_role_privilege` VALUES ('5016', '117', '13', '1468818181');
INSERT INTO `gvs_role_privilege` VALUES ('5017', '1', '442', '1468818193');
INSERT INTO `gvs_role_privilege` VALUES ('5018', '1', '13', '1468818193');
INSERT INTO `gvs_role_privilege` VALUES ('5019', '1', '443', '1468818193');
INSERT INTO `gvs_role_privilege` VALUES ('5020', '1', '444', '1468818193');
INSERT INTO `gvs_role_privilege` VALUES ('5021', '1', '445', '1468818193');
INSERT INTO `gvs_role_privilege` VALUES ('5022', '1', '446', '1468818193');
INSERT INTO `gvs_role_privilege` VALUES ('5023', '1', '447', '1468818193');
INSERT INTO `gvs_role_privilege` VALUES ('5024', '1', '448', '1468818193');
INSERT INTO `gvs_role_privilege` VALUES ('5027', '117', '451', '1469154766');
INSERT INTO `gvs_role_privilege` VALUES ('5033', '117', '452', '1469505817');
INSERT INTO `gvs_role_privilege` VALUES ('5036', '117', '453', '1469515393');
INSERT INTO `gvs_role_privilege` VALUES ('5039', '117', '454', '1469530449');
INSERT INTO `gvs_role_privilege` VALUES ('5042', '117', '455', '1469603687');
INSERT INTO `gvs_role_privilege` VALUES ('5045', '117', '456', '1469611652');
INSERT INTO `gvs_role_privilege` VALUES ('5048', '117', '457', '1469614311');
INSERT INTO `gvs_role_privilege` VALUES ('5051', '117', '458', '1470031451');
INSERT INTO `gvs_role_privilege` VALUES ('5083', '117', '459', '1470137088');
INSERT INTO `gvs_role_privilege` VALUES ('5086', '117', '460', '1470208352');
INSERT INTO `gvs_role_privilege` VALUES ('5089', '117', '461', '1470210112');
INSERT INTO `gvs_role_privilege` VALUES ('5092', '117', '462', '1470221872');
INSERT INTO `gvs_role_privilege` VALUES ('5095', '117', '463', '1470650126');
INSERT INTO `gvs_role_privilege` VALUES ('5098', '117', '464', '1470728336');
INSERT INTO `gvs_role_privilege` VALUES ('5100', '117', '465', '1470728336');
INSERT INTO `gvs_role_privilege` VALUES ('5101', '117', '466', '1470812180');
INSERT INTO `gvs_role_privilege` VALUES ('5104', '117', '468', '1471229102');
INSERT INTO `gvs_role_privilege` VALUES ('5124', '117', '469', '1471328695');
INSERT INTO `gvs_role_privilege` VALUES ('5125', '117', '379', '1471328695');
INSERT INTO `gvs_role_privilege` VALUES ('5126', '117', '377', '1471328695');
INSERT INTO `gvs_role_privilege` VALUES ('5127', '1', '469', '1471328809');
INSERT INTO `gvs_role_privilege` VALUES ('5128', '1', '379', '1471328809');
INSERT INTO `gvs_role_privilege` VALUES ('5130', '1', '464', '1471329858');
INSERT INTO `gvs_role_privilege` VALUES ('5131', '1', '377', '1471329858');
INSERT INTO `gvs_role_privilege` VALUES ('5132', '1', '465', '1471329858');
INSERT INTO `gvs_role_privilege` VALUES ('5133', '1', '467', '1471329858');
INSERT INTO `gvs_role_privilege` VALUES ('5134', '117', '470', '1471425428');
INSERT INTO `gvs_role_privilege` VALUES ('5137', '117', '471', '1471425428');
INSERT INTO `gvs_role_privilege` VALUES ('5138', '117', '450', '1471425428');
INSERT INTO `gvs_role_privilege` VALUES ('5139', '117', '449', '1471425428');
INSERT INTO `gvs_role_privilege` VALUES ('5140', '1', '449', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5141', '1', '450', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5142', '1', '463', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5143', '1', '454', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5144', '1', '452', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5145', '1', '451', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5146', '1', '453', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5147', '1', '455', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5148', '1', '456', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5149', '1', '458', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5150', '1', '457', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5151', '1', '459', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5152', '1', '460', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5153', '1', '461', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5154', '1', '462', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5155', '1', '466', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5156', '1', '468', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5157', '1', '470', '1471425465');
INSERT INTO `gvs_role_privilege` VALUES ('5158', '1', '471', '1471425465');

-- ----------------------------
-- Table structure for gvs_session
-- ----------------------------
DROP TABLE IF EXISTS `gvs_session`;
CREATE TABLE `gvs_session` (
  `session_id` varchar(24) NOT NULL DEFAULT '' COMMENT 'Session id',
  `last_active` int(10) unsigned NOT NULL DEFAULT '0' COMMENT 'Last active time',
  `contents` varchar(1000) NOT NULL DEFAULT '' COMMENT 'Session data',
  PRIMARY KEY (`session_id`),
  KEY `last_active` (`last_active`)
) ENGINE=MEMORY DEFAULT CHARSET=utf8 COMMENT='会话信息表';

-- ----------------------------
-- Records of gvs_session
-- ----------------------------
INSERT INTO `gvs_session` VALUES ('57b54403e3d089-57534565', '1471500123', 'YToyOntzOjExOiJsYXN0X2FjdGl2ZSI7aToxNDcxNTAwMTIzO3M6NjoiYXV0aG9yIjthOjExOntzOjEwOiJhY2NvdW50X2lkIjtzOjE6IjEiO3M6MTE6ImVtcGxveWVlX2lkIjtzOjE6IjAiO3M6MTA6ImdpdmVuX25hbWUiO3M6NDoicm9vdCI7czo0OiJuYW1lIjtzOjQ6InJvb3QiO3M6ODoicGFzc3dvcmQiO3M6MzI6Ijk2ZTc5MjE4OTY1ZWI3MmM5MmE1NDlkZDVhMzMwMTEyIjtzOjU6ImVtYWlsIjtzOjE3OiJyb290QGdvbWVwbHVzLmNvbSI7czo1OiJwaG9uZSI7czoxMToiMTU2MDAzNTYzOTQiO3M6NjoibW9iaWxlIjtzOjA6IiI7czo2OiJzdGF0dXMiO3M6MToiMCI7czoxMToiY3JlYXRlX3RpbWUiO3M6MToiMCI7czoxMToidXBkYXRlX3RpbWUiO3M6MTA6IjE0NjYyMzQzODYiO319');

-- ----------------------------
-- Table structure for gvs_system
-- ----------------------------
DROP TABLE IF EXISTS `gvs_system`;
CREATE TABLE `gvs_system` (
  `system_id` int(10) NOT NULL AUTO_INCREMENT COMMENT '系统id',
  `name` char(10) NOT NULL DEFAULT '' COMMENT '系统名称',
  `domain` char(100) NOT NULL DEFAULT '' COMMENT '域名',
  `portal` char(100) NOT NULL DEFAULT '' COMMENT '入口文件',
  `status` tinyint(1) NOT NULL DEFAULT '0' COMMENT '状态 －1删除 0默认',
  `create_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '创建时间',
  `update_time` int(10) unsigned NOT NULL DEFAULT '0' COMMENT '更新时间',
  PRIMARY KEY (`system_id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8 COMMENT='系统表';

-- ----------------------------
-- Records of gvs_system
-- ----------------------------
INSERT INTO `gvs_system` VALUES ('1', 'Gome视频管理平台', 'gvs.test.gomeplus.com', 'index.php', '0', '1398759185', '1462932557');
