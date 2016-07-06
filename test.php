<?php
header("Content-type: text/html; charset=utf-8");

// 引入类库
include('./Sql.class.php');

// 默认读取的sql语句是数组形式
$sql = Sql::getSqlFromFile('./test.sql');
echo "【已数组形式返回sql语句】";
echo "<pre>";
var_dump($sql);
echo "</pre>";

// 读取的sql语句为一条语句
$sql = Sql::getSqlFromFile('./test.sql', true);
echo "【已单条语句形式返回sql语句】";
echo "<pre>";
var_dump($sql);
echo "</pre>";

// 替换表前缀
$sql = Sql::getSqlFromFile('./test.sql', false, array('my_' => 'me_'));
echo "【替换表前缀】";
echo "<pre>";
var_dump($sql);
echo "</pre>";
?>