## 简介

这是一个简单易用的PHP类库，可以读取sql文件，并获得纯sql语句。

## 支持
经测试，从**Navicat for MySql** 和 **phpMyAdmin**导出的sql文件均可读取。

## 使用

-  导入类库：

`include('./Sql.class.php');`

-  直接调用静态方法：

`Sql::getSqlFromFile($file_path)`

### 默认已数组形式返回sql语句
```php
Sql::getSqlFromFile($file_path)；
```

```php
array(8) {
  [0]=>  string(24) "SET FOREIGN_KEY_CHECKS=0"
  [1]=>  string(38) "DROP TABLE IF EXISTS `my_plugin_hello`"
  [2]=>  string(251) "CREATE TABLE `my_plugin_hello` (  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '名人',  `said` text NOT NULL COMMENT '名言',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8"
  [3]=>  string(146) "INSERT INTO `my_plugin_hello` VALUES ('1', '网络', '生活是一面镜子。你对它笑，它就对你笑；你对它哭，它也对你哭。')"
  [4]=>  string(176) "INSERT INTO `my_plugin_hello` VALUES ('2', '网络', '活着一天，就是有福气，就该珍惜。当我哭泣我没有鞋子穿的时候，我发现有人却没有脚。')"
  [5]=>  string(122) "INSERT INTO `my_plugin_hello` VALUES ('3', '爱迪生', '天才是百分之一的灵感加百分之九十九的汗水。')"
  [6]=>  string(128) "INSERT INTO `my_plugin_hello` VALUES ('4', '美华纳', '勿问成功的秘诀为何，且尽全力做你应该做的事吧。')"
  [7]=>  string(101) "INSERT INTO `my_plugin_hello` VALUES ('5', '陶铸', '如烟往事俱忘却，心底无私天地宽')"
}
```

### 以单条语句返回

> 只需将第二个参数设为`true`即可。

```php
Sql::getSqlFromFile($file_path, true)；
```

```php
string(994) "SET FOREIGN_KEY_CHECKS=0;DROP TABLE IF EXISTS `my_plugin_hello`;CREATE TABLE `my_plugin_hello` (  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '名人',  `said` text NOT NULL COMMENT '名言',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8;INSERT INTO `my_plugin_hello` VALUES ('1', '网络', '生活是一面镜子。你对它笑，它就对你笑；你对它哭，它也对你哭。');INSERT INTO `my_plugin_hello` VALUES ('2', '网络', '活着一天，就是有福气，就该珍惜。当我哭泣我没有鞋子穿的时候，我发现有人却没有脚。');INSERT INTO `my_plugin_hello` VALUES ('3', '爱迪生', '天才是百分之一的灵感加百分之九十九的汗水。');INSERT INTO `my_plugin_hello` VALUES ('4', '美华纳', '勿问成功的秘诀为何，且尽全力做你应该做的事吧。');INSERT INTO `my_plugin_hello` VALUES ('5', '陶铸', '如烟往事俱忘却，心底无私天地宽');"
```

### 替换表前缀

> 有时候我们读取sql文件时，可能想要替换表前缀，那么可以添加第三个参数。

```php
Sql::getSqlFromFile($file_path, true, array('my_' => 'me_'))；
```

```php
array(8) {
  [0]=>  string(24) "SET FOREIGN_KEY_CHECKS=0"
  [1]=>  string(38) "DROP TABLE IF EXISTS `me_plugin_hello`"
  [2]=>  string(251) "CREATE TABLE `me_plugin_hello` (  `id` int(11) unsigned NOT NULL AUTO_INCREMENT,  `name` varchar(32) NOT NULL DEFAULT '' COMMENT '名人',  `said` text NOT NULL COMMENT '名言',  PRIMARY KEY (`id`)) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8"
  [3]=>  string(146) "INSERT INTO `me_plugin_hello` VALUES ('1', '网络', '生活是一面镜子。你对它笑，它就对你笑；你对它哭，它也对你哭。')"
  [4]=>  string(176) "INSERT INTO `me_plugin_hello` VALUES ('2', '网络', '活着一天，就是有福气，就该珍惜。当我哭泣我没有鞋子穿的时候，我发现有人却没有脚。')"
  [5]=>  string(122) "INSERT INTO `me_plugin_hello` VALUES ('3', '爱迪生', '天才是百分之一的灵感加百分之九十九的汗水。')"
  [6]=>  string(128) "INSERT INTO `me_plugin_hello` VALUES ('4', '美华纳', '勿问成功的秘诀为何，且尽全力做你应该做的事吧。')"
  [7]=>  string(101) "INSERT INTO `me_plugin_hello` VALUES ('5', '陶铸', '如烟往事俱忘却，心底无私天地宽')"
}
```

> 如果你有更好的想法，不妨一起完善它吧，虽然是很微不足道的东西^_^

## 开源协议
 [MIT license](http://www.opensource.org/licenses/MIT).