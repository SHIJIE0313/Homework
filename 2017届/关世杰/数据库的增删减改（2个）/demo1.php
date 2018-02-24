<?php
/**
 *数据库操作关键函数
 *mysql_connect：连接数据
 *mysql_error：最后一次sql动作错误信息
 *mysqli_query：执行sql语句，增删该查
 *mysql_select_db：选择数据库
 *mysql_fetch_array：从查询结果取1条查询记录
 *mysql_close：关闭数据库连接
 */

function println($msg)
{
    echo "<br>";
    echo $msg;
}

/**数据库配置*/
$mysql_server_name = "localhost"; //改成自己的mysql数据库服务器
$mysql_username = "GUANSHIJIE"; //改成自己的mysql数据库用户名
$mysql_password = "19990313"; //改成自己的mysql数据库密码
$mysql_database = "mysql"; //改成自己的mysql数据库名
$mysql_table = "db"; //改成自己的表名

/**
 * 连接数据库
 */
$con = mysqli_connect($mysql_server_name, $mysql_username, $mysql_password); //连接数据库
if (!$con) {
    die('Could not connect: ' . mysqli_error($con));
}
/**
 * 删除数据库：db2
 */
$sql_delete_db = "drop database $mysql_database";
if (mysqli_query($con, $sql_delete_db)) {
    println("$sql_delete_db ok");
} else {
    println("$sql_delete_db failed:" . mysqli_error($con));
}

/**
 * 创建数据库：db2
 */
$sql_create_db = "create database $mysql_database";
if (mysqli_query($con, $sql_create_db)) {
    println("create ok");
} else {
    println("create failed:" . mysqli_error($con));
}

/**
 * 选择数据库；db2
 */
mysqli_select_db($con, $mysql_database);

/**
 * 创建数据表；person
 */
$sql_create_table = "create table $mysql_table(id int NOT NULL AUTO_INCREMENT,PRIMARY KEY(id),name varchar(15),age int)";
if (mysqli_query($con, $sql_create_table)) {
    println("create table ok");
} else {
    println("create table failed:" . mysqli_error($con));
}
/**
 * 从表（person）中删除数据；
 */
$sql_delete = "delete from $mysql_table where age = 200";
if (mysqli_query($con, $sql_delete)) {
    println("delete table ok");
} else {
    println("delete table failed:" . mysqli_error($con));
}

/**
 * 在表（person）中插入新数据；
 */
$age = rand(12, 80);//随机生成年龄
$sql_inset = "insert into $mysql_table (name,age) value ('flying_$age',$age)";
if (mysqli_query($con, $sql_inset)) {
    println("insert table ok");
} else {
    println("insert table failed:" . mysqli_error($con));
}
/**
 * 从表（person）中查询数据；
 */
$sql_select = "select * from  $mysql_table order by age";
$result = mysqli_query($con, $sql_select);
/**   输出查询结果   */
while ($row = mysqli_fetch_array($result)) {
    println($row['id'] . " " . $row['name'] . " " . $row['age']);
}
$result->close();

/**
 * 更新表（person）中数据；
 */
$sql_update = "update $mysql_table set age = 200 where age < 67";
$result = mysqli_query($con, $sql_update);
println($result);
if ($result) {
    println("sql_update table ok");
} else {
    println("sql_update table failed:" . mysqli_error($con));
}
/**
 * 关闭数据库连接
 */
mysqli_close($con);
?>