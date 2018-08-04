<!DOCTYPE html>
<html>
<!--
	面试结果
-->
	<head>
		<meta charset="UTF-8">
		<title>报名结果</title>
		<link rel="stylesheet" href="css/result.css" />
		<script type="text/javascript" src="js/result.js"></script>
	</head>

	<body>
		<div id="result">
			<h1>报名成功
			<br>
			你的编号为：<?php
			session_start();
			$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
			mysqli_query($firstsql, "set names utf8;");
			$name = $_SESSION["name"];
			$ID = "select ID from test where name='$name'";
			$result = mysqli_query($firstsql, $ID);
			$row = mysqli_fetch_row($result);
			echo $row[0];
			?>
			<br>
			请于 <?php
			echo $_SESSION["time"];
			?>
			到建行二楼阳光网站参加初试</h1>
			
		</div>
	</body>

</html>