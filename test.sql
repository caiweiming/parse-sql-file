/*
// +----------------------------------------------------------------------
// | 读取Sql文件并返回可执行的sql语句
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://caiweiming.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: CaiWeiMing <314013107@qq.com>
// +----------------------------------------------------------------------
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `my_plugin_hello`
-- ----------------------------
DROP TABLE IF EXISTS `my_plugin_hello`;
CREATE TABLE `my_plugin_hello` (
  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '名人',
  `said` text NOT NULL COMMENT '名言',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of my_plugin_hello
-- ----------------------------
INSERT INTO `my_plugin_hello` VALUES ('1', '网络', '生活是一面镜子。你对它笑，它就对你笑；你对它哭，它也对你哭。');
INSERT INTO `my_plugin_hello` VALUES ('2', '网络', '活着一天，就是有福气，就该珍惜。当我哭泣我没有鞋子穿的时候，我发现有人却没有脚。');
INSERT INTO `my_plugin_hello` VALUES ('3', '爱迪生', '天才是百分之一的灵感加百分之九十九的汗水。');
INSERT INTO `my_plugin_hello` VALUES ('4', '美华纳', '勿问成功的秘诀为何，且尽全力做你应该做的事吧。');
INSERT INTO `my_plugin_hello` VALUES ('5', '陶铸', '如烟往事俱忘却，心底无私天地宽');
