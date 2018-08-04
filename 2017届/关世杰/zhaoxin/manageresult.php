<?php
//面试官确认页面
session_start();
$Id = $_SESSION["ID"];
$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
mysqli_query($firstsql, "set names utf8;");
$check = "update test set manageid = '已参加初试' where ID= '$Id'";
$result = mysqli_query($firstsql, $check);
echo "<script>alert('感谢你的使用，点击确认返回管理系统首页。');window.location.href='www.shijie666.cn/GL.html'</script>";

?>