<?php
//结果查询配置文件
session_start();
header("charset=utf-8");
$phnum = $_POST["phnum"];
$Id = $_POST["Id"];
$_SESSION["Id"] = $Id;

$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
mysqli_query($firstsql, "set names utf8;");
$PHONE = "select phone from test where phone='$phnum'";
$result = mysqli_query($firstsql, $PHONE);
$row = mysqli_fetch_row($result);

$ID = "select ID from test where phone='$phnum'";
$result2 = mysqli_query($firstsql, $ID);
$row2 = mysqli_fetch_row($result2);
if($phnum==null||$Id==null){
	echo "<script>alert('请核对你的信息！'); history.go(-1);</script>";
	break;
}
if ($row[0] == $phnum && $row2[0] == $Id) {
   print <<<EOT
	<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<script>
			location.replace("find.php");
		</script>
	</body>
</html>
EOT;
}else{
	echo "<script>alert('请核对你的信息！'); history.go(-1);</script>";
}
?>