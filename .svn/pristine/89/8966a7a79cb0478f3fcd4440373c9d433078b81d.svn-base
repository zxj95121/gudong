/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50505
Source Host           : 127.0.0.1:3306
Source Database       : tm_early

Target Server Type    : MYSQL
Target Server Version : 50505
File Encoding         : 65001

Date: 2017-08-06 20:43:43
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for course
-- ----------------------------
DROP TABLE IF EXISTS `course`;
CREATE TABLE `course` (
  `course_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `subject_id` int(11) NOT NULL COMMENT '所属阶段id【关联subject表】',
  `stage_id` int(11) NOT NULL COMMENT '所属阶段',
  `course_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '课程名称',
  `status` tinyint(2) NOT NULL COMMENT '课程状态【1、正常；2、关闭】',
  PRIMARY KEY (`course_id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='课程表';

-- ----------------------------
-- Records of course
-- ----------------------------

-- ----------------------------
-- Table structure for menu
-- ----------------------------
DROP TABLE IF EXISTS `menu`;
CREATE TABLE `menu` (
  `menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键菜单id',
  `menu_name` varchar(50) NOT NULL COMMENT '菜单名称',
  `controller_name` varchar(80) NOT NULL COMMENT '控制器名称',
  `action_name` varchar(80) NOT NULL COMMENT '操作名称',
  `parent_menu_id` int(11) NOT NULL DEFAULT '0' COMMENT '父菜单的id【0，第一级菜单】',
  `is_show` tinyint(2) NOT NULL DEFAULT '1' COMMENT '是否显示【2，不显示；1、显示】',
  `icon` varchar(100) DEFAULT NULL COMMENT 'icon的名称',
  `list_order` int(11) NOT NULL DEFAULT '0' COMMENT '排序【越大越靠前】',
  PRIMARY KEY (`menu_id`)
) ENGINE=MyISAM AUTO_INCREMENT=13 DEFAULT CHARSET=utf8 COMMENT='网站菜单管理';

-- ----------------------------
-- Records of menu
-- ----------------------------
INSERT INTO `menu` VALUES ('1', '人力资源管理', '', '', '0', '1', 'user', '0');
INSERT INTO `menu` VALUES ('2', '员工管理', 'human', 'staff', '1', '1', null, '0');
INSERT INTO `menu` VALUES ('3', '会员管理', 'human', 'user', '1', '1', null, '0');
INSERT INTO `menu` VALUES ('4', '菜单权限管理', '', '', '0', '1', 'file-text', '0');
INSERT INTO `menu` VALUES ('6', '菜单管理', 'power', 'menu', '4', '1', null, '2');
INSERT INTO `menu` VALUES ('9', '门店管理', 'store', 'info', '8', '1', null, '0');
INSERT INTO `menu` VALUES ('7', '角色管理', 'power', 'role', '4', '1', null, '1');
INSERT INTO `menu` VALUES ('8', '门店信息管理', '', '', '0', '1', 'home', '0');
INSERT INTO `menu` VALUES ('10', '教学课程管理', '', '', '0', '1', 'pencil', '0');
INSERT INTO `menu` VALUES ('11', '科目管理', 'study', 'subject', '10', '1', null, '0');
INSERT INTO `menu` VALUES ('12', '阶段管理', 'study', 'stage', '10', '1', null, '0');

-- ----------------------------
-- Table structure for points
-- ----------------------------
DROP TABLE IF EXISTS `points`;
CREATE TABLE `points` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增id',
  `user_id` int(11) NOT NULL COMMENT '关联到用户表的user_id',
  `type` tinyint(2) NOT NULL DEFAULT '1' COMMENT '积分类型【0、减积分；1、加积分】',
  `points` int(11) NOT NULL DEFAULT '0' COMMENT '本次变动积分数量',
  `note` varchar(100) DEFAULT NULL COMMENT '积分变动理由',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COMMENT='积分变动记录';

-- ----------------------------
-- Records of points
-- ----------------------------

-- ----------------------------
-- Table structure for rel_role_menu
-- ----------------------------
DROP TABLE IF EXISTS `rel_role_menu`;
CREATE TABLE `rel_role_menu` (
  `rel_role_menu_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色菜单关系主键',
  `menu_id` int(11) NOT NULL COMMENT '菜单id',
  `role_id` int(11) NOT NULL COMMENT '角色id',
  PRIMARY KEY (`rel_role_menu_id`),
  KEY `menu_id` (`menu_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8 COMMENT='角色菜单管理';

-- ----------------------------
-- Records of rel_role_menu
-- ----------------------------
INSERT INTO `rel_role_menu` VALUES ('13', '3', '1');
INSERT INTO `rel_role_menu` VALUES ('17', '2', '2');
INSERT INTO `rel_role_menu` VALUES ('12', '2', '1');
INSERT INTO `rel_role_menu` VALUES ('11', '1', '1');
INSERT INTO `rel_role_menu` VALUES ('16', '1', '2');
INSERT INTO `rel_role_menu` VALUES ('14', '4', '1');
INSERT INTO `rel_role_menu` VALUES ('15', '7', '1');
INSERT INTO `rel_role_menu` VALUES ('18', '4', '2');
INSERT INTO `rel_role_menu` VALUES ('19', '7', '2');
INSERT INTO `rel_role_menu` VALUES ('41', '7', '3');
INSERT INTO `rel_role_menu` VALUES ('40', '6', '3');
INSERT INTO `rel_role_menu` VALUES ('39', '4', '3');
INSERT INTO `rel_role_menu` VALUES ('38', '3', '3');
INSERT INTO `rel_role_menu` VALUES ('37', '1', '3');
INSERT INTO `rel_role_menu` VALUES ('36', '6', '4');
INSERT INTO `rel_role_menu` VALUES ('35', '4', '4');
INSERT INTO `rel_role_menu` VALUES ('34', '3', '4');
INSERT INTO `rel_role_menu` VALUES ('33', '2', '4');
INSERT INTO `rel_role_menu` VALUES ('32', '1', '4');

-- ----------------------------
-- Table structure for role
-- ----------------------------
DROP TABLE IF EXISTS `role`;
CREATE TABLE `role` (
  `role_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '角色id',
  `role_name` varchar(100) NOT NULL COMMENT '角色名称',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态【1、正常；2、异常；】',
  PRIMARY KEY (`role_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8 COMMENT='角色表';

-- ----------------------------
-- Records of role
-- ----------------------------
INSERT INTO `role` VALUES ('1', '超级管理员', '1');
INSERT INTO `role` VALUES ('2', '系统管理员', '1');
INSERT INTO `role` VALUES ('3', '门店管理员', '1');
INSERT INTO `role` VALUES ('4', '财务人员', '1');
INSERT INTO `role` VALUES ('5', '物流人员', '2');
INSERT INTO `role` VALUES ('6', '信息部长22', '2');

-- ----------------------------
-- Table structure for staff
-- ----------------------------
DROP TABLE IF EXISTS `staff`;
CREATE TABLE `staff` (
  `staff_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增的id',
  `staff_name` varchar(100) NOT NULL COMMENT '用户名',
  `password` varchar(100) NOT NULL COMMENT '管理员密码',
  `store_id` int(11) NOT NULL DEFAULT '0' COMMENT '所属门店（0代表不属于门店）',
  `gender` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别【1：男；2：女；3：未知】',
  `header_img` varchar(100) DEFAULT NULL COMMENT '头像',
  `mobile` varchar(12) DEFAULT NULL COMMENT '手机号码',
  `subject_id` int(11) DEFAULT '0' COMMENT '所教科目',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '员工状态【1、正常；2、休假；3、离职；】',
  `add_ts` int(11) NOT NULL DEFAULT '0' COMMENT '添加时间',
  `last_ts` int(11) NOT NULL DEFAULT '0' COMMENT '最后更新时间',
  PRIMARY KEY (`staff_id`),
  KEY `store_id` (`store_id`) USING BTREE,
  KEY `subject_id` (`subject_id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COMMENT='职员表';

-- ----------------------------
-- Records of staff
-- ----------------------------
INSERT INTO `staff` VALUES ('1', 'Leo', 'cd6b24bb4586ee3bfb20f6fdacc1a481', '1', '1', '\\uploads\\20170802\\56687e0da549dbe807bfc3dddcbd539f.png', '15385510115', '2', '1', '0', '1501652800');
INSERT INTO `staff` VALUES ('2', 'li', 'b5a0da72f0c015dc378504c622c12597', '1', '2', '\\uploads\\20170801\\44ca691b811d162c85d1f9b1ddd761ab.png', '13655551111', '1', '1', '0', '1501591409');
INSERT INTO `staff` VALUES ('3', 'xie', 'b5a0da72f0c015dc378504c622c12597', '1', '1', null, '13655551112', '1', '1', '0', '1501645553');
INSERT INTO `staff` VALUES ('4', 'Leo.xie', 'e10adc3949ba59abbe56e057f20f883e', '1', '2', '\\uploads\\20170801\\ba38da11c49e41471c23bcc413291a60.png', '15385510117', '1', '1', '1501584690', '1501584690');

-- ----------------------------
-- Table structure for stage
-- ----------------------------
DROP TABLE IF EXISTS `stage`;
CREATE TABLE `stage` (
  `stage_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增阶段主键',
  `stage_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '阶段名称',
  `status` tinyint(2) NOT NULL COMMENT '状态【1、正常；2、异常】',
  PRIMARY KEY (`stage_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='阶段管理';

-- ----------------------------
-- Records of stage
-- ----------------------------
INSERT INTO `stage` VALUES ('1', '阶段QQ', '2');
INSERT INTO `stage` VALUES ('2', '阶段AA', '1');

-- ----------------------------
-- Table structure for store
-- ----------------------------
DROP TABLE IF EXISTS `store`;
CREATE TABLE `store` (
  `store_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '门店自增主键',
  `store_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '门店名称',
  `tel` varchar(25) CHARACTER SET utf8 DEFAULT NULL COMMENT '门店联系电话',
  `tel_name` varchar(25) CHARACTER SET utf8 DEFAULT NULL COMMENT '联系人',
  `lng` decimal(12,6) DEFAULT NULL COMMENT '经度',
  `lat` decimal(12,6) DEFAULT NULL COMMENT '纬度',
  `store_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '门店图片',
  `address` varchar(500) CHARACTER SET utf8 NOT NULL COMMENT '门店地址',
  `status` tinyint(11) NOT NULL DEFAULT '1' COMMENT '门店状态【1、正常；2、休整】',
  PRIMARY KEY (`store_id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1 COMMENT='门店信息';

-- ----------------------------
-- Records of store
-- ----------------------------
INSERT INTO `store` VALUES ('1', '长江南路', '021-12345678', '张老师', '0.000000', '0.000000', '\\uploads\\20170806\\0c0e3c44af42458f74af899da49dfaf4.png', '长江饭店555号', '1');
INSERT INTO `store` VALUES ('2', '长江北路', '15385510115', '李老师', '0.000000', '0.000000', '\\uploads\\20170806\\33542883ef7e90ac41fed307f53ef32d.png', '上海市普陀区长江北路33号', '1');

-- ----------------------------
-- Table structure for subject
-- ----------------------------
DROP TABLE IF EXISTS `subject`;
CREATE TABLE `subject` (
  `subject_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '科目id',
  `subject_name` varchar(255) CHARACTER SET utf8 NOT NULL COMMENT '科目名称',
  `status` tinyint(2) NOT NULL DEFAULT '1' COMMENT '状态【1、在授；2、下架；】',
  PRIMARY KEY (`subject_id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1 COMMENT='科目管理';

-- ----------------------------
-- Records of subject
-- ----------------------------
INSERT INTO `subject` VALUES ('1', '数学', '1');
INSERT INTO `subject` VALUES ('2', '语文', '1');
INSERT INTO `subject` VALUES ('3', '英语', '1');
INSERT INTO `subject` VALUES ('5', '新课程', '2');
INSERT INTO `subject` VALUES ('6', 'A科目', '1');

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `user_id` int(11) NOT NULL AUTO_INCREMENT COMMENT '自增主键',
  `name` varchar(255) NOT NULL COMMENT '用户的名称',
  `password` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户密码',
  `header_img` varchar(255) CHARACTER SET utf8 DEFAULT NULL COMMENT '头像',
  `mobile` varchar(11) CHARACTER SET utf8 DEFAULT NULL COMMENT '手机号',
  `gender` tinyint(2) NOT NULL DEFAULT '0' COMMENT '性别【1、男；2、女；3、未知】',
  `points` int(11) NOT NULL DEFAULT '0' COMMENT '积分数',
  `openid` varchar(50) CHARACTER SET utf8 DEFAULT NULL COMMENT '用户的openid',
  `add_ts` int(11) NOT NULL COMMENT '用户的添加时间',
  `last_ts` int(11) NOT NULL,
  `recommend_id` int(11) DEFAULT NULL COMMENT '推荐人【关联到user表的user_id】',
  PRIMARY KEY (`user_id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1 COMMENT='用户管理表';

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', 'user_11', 'b5a0da72f0c015dc378504c622c12597', '\\uploads\\20170802\\d519ee47933fa47958f2ede2245b2620.png', '15385510115', '2', '22', '', '1501641381', '1501641381', null);
INSERT INTO `user` VALUES ('2', '222', 'e10adc3949ba59abbe56e057f20f883e', '\\uploads\\20170802\\cb3daaa78c19e0d478e34fab35cc15a6.png', '15385510117', '1', '10', null, '1501641471', '1501641471', null);
INSERT INTO `user` VALUES ('3', '334', 'e10adc3949ba59abbe56e057f20f883e', '\\uploads\\20170802\\aaaf05fe33d70806615dee96fc21fc4e.png', '15385510117', '3', '0', null, '1501645307', '1501645307', null);
INSERT INTO `user` VALUES ('4', '4444', 'e10adc3949ba59abbe56e057f20f883e', null, null, '1', '0', null, '1501652816', '1501652816', null);
