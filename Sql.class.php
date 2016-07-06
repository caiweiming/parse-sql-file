<?php
// +----------------------------------------------------------------------
// | 读取Sql文件并返回可执行的sql语句
// +----------------------------------------------------------------------
// | Copyright (c) 2016 http://caiweiming.com All rights reserved.
// +----------------------------------------------------------------------
// | Author: CaiWeiMing <314013107@qq.com>
// +----------------------------------------------------------------------

class Sql
{
    /**
     * 从sql文件获取纯sql语句
     * @param  string $sql_file sql文件路径
     * @param  bool $string 如果为真，则只返回一条sql语句，默认以数组形式返回
     * @param  array $replace 替换前缀，如：['my_' => 'me_']，表示将表前缀"my_"替换成"me_"
     * @return mixed
     */
    public static function getSqlFromFile($sql_file = '', $string = false, $replace = [])
    {
        if (!file_exists($sql_file)) {
            return false;
        }

        // 读取sql文件内容
        $handle = self::read_file($sql_file);

        // 分割语句
        $handle = self::parseSql($handle, $string, $replace);

        return $handle;
    }

    /**
     * 分割sql语句
     * @param  string $content sql内容
     * @param  bool $string 如果为真，则只返回一条sql语句，默认以数组形式返回
     * @param  array $replace 替换前缀，如：['my_' => 'me_']，表示将表前缀my_替换成me_
     * @return array|string 除去注释之后的sql语句数组或一条语句
     */
    public static function parseSql($content = '', $string = false, $replace = [])
    {
        // 纯sql内容
        $pure_sql = '';

        if ($content != '') {
            // 多行注释标记
            $comment = false;

            // 按行分割
            $content = str_replace(["\r\n", "\r"], "\n", $content);
            $content = explode("\n", trim($content));

            // 循环处理每一行
            foreach ($content as $key => $line) {
                // 跳过空行
                if ($line == '') {
                    continue;
                }

                // 跳过以/**/包裹起来的单行注释
                if (substr($line, 0, 2) == '/*' && (substr($line, -2) == '*/' || substr($line, -3, 2) == '*/')) {
                    continue;
                }

                // 多行注释开始
                if (substr($line, 0, 2) == '/*') {
                    $comment = true;
                    continue;
                }

                // 多行注释结束
                if (substr($line, -2) == '*/') {
                    $comment = false;
                    continue;
                }

                // 多行注释没有结束，跳过
                if ($comment) {
                    continue;
                }

                // 跳过以#或者--开头的单行注释
                if (substr($line, 0, 1) == '#' || substr($line, 0, 2) == '--') {
                    continue;
                }

                // sql语句
                $pure_sql .= $line;
            }

            // 替换表前缀
            if (!empty($replace)) {
                foreach ($replace as $key => $value) {
                    $pure_sql = str_replace('`'.$key, '`'.$value, $pure_sql);
                }
            }

            // 只返回一条语句
            if ($string) {
                return $pure_sql;
            }

            // 以数组形式返回sql语句
            $pure_sql = rtrim($pure_sql, ';');
            $pure_sql = explode(';', $pure_sql);
        }

        return $pure_sql;
    }

    /**
     * 读取文件内容
     * @param $filename  文件名
     * @return string 文件内容
     */
    public static function read_file($filename) {
        $content = '';
        if(function_exists('file_get_contents')) {
            @$content = file_get_contents($filename);
        } else {
            if(@$fp = fopen($filename, 'r')) {
                @$content = fread($fp, filesize($filename));
                @fclose($fp);
            }
        }
        return $content;
    }
}