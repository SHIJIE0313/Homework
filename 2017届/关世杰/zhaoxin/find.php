<!DOCTYPE html>
<!--
	这个页面是结果查询的结果页面   
-->
<html>

	<head>
		<meta charset="UTF-8">
		<title>测试页面</title>
		<link rel="stylesheet" href="css/yanzheng.css" />
	</head>

	<body>
		<div class="middle">
			<div class="middles">
				<?php 
				session_start();
			$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
			mysqli_query($firstsql, "set names utf8;");
			$Id = $_SESSION["Id"];
			$PIN = "select pin from test where ID='$Id'";
			$result = mysqli_query($firstsql, $PIN);
			$row = mysqli_fetch_row($result);
			if($row[0]==1){
				echo "恭喜你，你已通过初试！";
			}else{
				echo"很遗憾，你未能通过我们的面试。";
			}
				?>
			</div>
		</div>
	</body>

</html>