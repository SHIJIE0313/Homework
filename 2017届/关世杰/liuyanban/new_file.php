<?php
$name = $_POST["name"];
$text = $_POST["text"];
$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
mysqli_query($firstsql, "set names utf8;");
$sql = "INSERT INTO liuyanban(name,text) 
VALUES ('$name','$text')";
mysqli_query($firstsql,$sql);
	$row = mysqli_affected_rows($firstsql);
	if ($row > 0){
		echo "<script>alert('提交成功'); history.go(-1);</script>";
	}else {
		echo "<script>alert('提交失败'); history.go(-1);</script>";
	}
?>