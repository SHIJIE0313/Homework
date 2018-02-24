<?php
/**
 * Created by PhpStorm.
 * User: Flying
 * Date: 2016/9/27
 * Time: 19:10
 */

function println($msg)
{
    echo "<br>";
    echo $msg;
}

$mysql_server_name = "localhost"; //改成自己的mysql数据库服务器
$mysql_username = "GUANSHIJIE"; //改成自己的mysql数据库用户名
$mysql_password = "19990313"; //改成自己的mysql数据库密码
$mysql_database = "mysql"; //改成自己的mysql数据【库】名
$mysql_table = "db"; //改成自己的mysql数据【表】名

/** 新建 连接 */
$mysqli = new mysqli($mysql_server_name, $mysql_username, $mysql_password);
/** 调试连接是否正常 */
//var_dump($mysqli);

/** check connection */
if ($mysqli->connect_errno) {
    printf("Connect failed: %s\n", $mysqli->connect_error);
    exit();
}

/** 删除 数据库 */
$sql_delete_db = "drop database $mysql_database";
if ($mysqli->query($sql_delete_db) === true) {
    printf("delete db4 ok");
} else {
    printf("delete db4 failed: %s\n", $mysqli->connect_error);
}

/**
 * 创建数据库：db4
 */
$sql_create_db = "create database $mysql_database";
if ($mysqli->query($sql_create_db) === true) {
    println("create db4 ok");
} else {
    println("create db4 failed:" . $mysqli->error);
}

/**
 * 选择数据库；db4
 */
$mysqli->select_db($mysql_database);

/**
 * 创建数据表；person
 */
$sql_create_table = "create table $mysql_table(id int NOT NULL AUTO_INCREMENT,PRIMARY KEY(id),name varchar(15),age int)";
if ($mysqli->query($sql_create_table) === true) {
    println("create table ok");
} else {
    println("create table failed:" . $mysqli->error);
}

/**
 * 从表（person）中删除数据；
 */
$sql_delete = "delete from $mysql_table where age = 200";
if ($mysqli->query($sql_delete) === true) {
    println("delete table data ok");
} else {
    println("delete table data failed:" . $mysqli->error);
}

/**
 * 在表（person）中插入新数据；
 */
$age = rand(12, 80);//随机生成年龄
$sql_inset = "insert into $mysql_table (name,age) value ('flying_$age',$age)";
if ($mysqli->query($sql_inset) === true) {
    println("insert table ok");
} else {
    println("insert table failed:" . $mysqli->error);
}
/**
 * 从表（person）中查询数据；
 */
$sql_select = "select * from  $mysql_table order by age";
if ($result = $mysqli->query($sql_select)) {
    printf("Select returned %d rows.\n", $result->num_rows);
    while ($row = $result->fetch_row()) {
        println("$row[0]  $row[1]  $row[2]");
    }
//    while ($row = $result->fetch_array()) {
//        println($row['id'] . "-" . $row['name'] . "-" . $row['age']);
//    }
    $result->close();
}


/**
 * 更新表（person）中数据；
 */
$sql_update = "update $mysql_table set age = 200 where age < 67";
if ($mysqli->query($sql_update) === true) {
    println("sql_update table ok");
} else {
    println("sql_update table failed:" . $mysqli->error);
}
/**
 * 关闭连接
 */
$mysqli->close();
?>