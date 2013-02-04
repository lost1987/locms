<?php
/**
 * Created by JetBrains PhpStorm.
 * User: lost
 * Date: 13-2-4
 * Time: 上午10:06
 * To change this template use File | Settings | File Templates.
 */
if( ! defined('BASEPATH')) exit('No direct script access allowed');

//后台控制器配置
$config['controller']['default'] = 'login';
$config['controller']['default_method'] = 'index';


$config['DB']['HOST'] = '127.0.0.1';
$config['DB']['USERNAME'] = 'root';
$config['DB']['PASSWORD'] = '';
$config['DB']['DEBUG'] = TRUE;
$config['DB']['DBNAME'] = 'locms';
$config['DB']['PREFIX'] = 'lo_';
$config['DB']['ENGINE'] = 'mysql';

//定义数据库字段类型 获取规则为 $config[engine_field]
//$config['mssql_field'] = array();
$config['mysql_field'] = array(
    'varchar',
    'int',
    'tinyint',
    'smallint',
    'double',
    'float',
    'datetime',
    'timestamp',
    'tinytext',
    'text',
    'mediumtext',
    'longtext',
    'blob'
);

$config['mysql_engine'] = array(
    'MyISAM',
    'InnoDB'
);

$config['mysql_table_charset'] = array(
    'utf8',
    'gbk'
);

?>