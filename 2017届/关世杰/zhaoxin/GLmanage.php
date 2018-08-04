<?php
//这是面试表  面试官的页面
header("charset=utf-8");
session_start();
$Id = $_POST["Id"];
$_SESSION["ID"] = $Id;
$admin = $_SESSION["admin"];
$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
mysqli_query($firstsql, "set names utf8;");
$admincheck = "select mingzi from account where account='$admin'";
$result2 = mysqli_query($firstsql, $admincheck);
$username = mysqli_fetch_assoc($result2);
$idcheck = "select ID,name,sex,province,city,phone,schoolclass,select1,select2,skill,suggest from test where ID='$Id'";
$result = mysqli_query($firstsql, $idcheck);
if (mysqli_num_rows($result) > 0) {
	while ($row = mysqli_fetch_assoc($result)) {
		print <<<EOT
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>阳光网站面试管理系统</title>
		<link rel="stylesheet" href="css/biaogemanage.css" />
	</head>

	<body>
		<div class="head">
			<h1>面试报名表</h1><span>当前用户：{$username["mingzi"]}</span>
		</div>
		<div class="center">
			<div class="centerleft">
			<div class="nr1" style="text-align: center; line-height: 55px;">
					<h2>基本信息</h2>
				</div>
				<div class="nr1">
					<p>编号：{$row["ID"]}</p>
				</div>
				<div class="nr1">
					<p>姓名：{$row["name"]}</p>
				</div>
				<div class="nr1">
					<p>性别：{$row["sex"]}</p>
				</div>
				<div class="nr1">
					<p>籍贯：{$row["province"]}{$row["city"]}</p>
				</div>
				<div class="nr1">
					<p>手机：{$row["phone"]}</p>
				</div>
				<div class="nr1">
					<p>学院：{$row["schoolclass"]}</p>
				</div>
				<div class="nr1">
					<p>第一意向部门：{$row["select1"]}</p>
				</div>
				<div class="nr1">
					<p>第二意向部门：{$row["select2"]}</p>
				</div>
				<div class="nr1">
					<p>掌握技能：{$row["skill"]}</p>
				</div>
			</div>
			<div class="centerright">
			<div class="nr1" style="text-align: center; line-height: 55px;">
					<h2>主观问题</h2>
				</div>
				<div class="nr2">
					<p>用三个词形容一下自己：</p>
				</div>
				<div class="nr2">
					<p>你为什么想加入网站：{$row["suggest"]}</p>
				</div>
				<div class="nr2">
					<p>你的心目中网站是什么样子的：</p>
				</div>
				<div class="nr2">
					<p>你的意向部门是什么，为什么加入？</p>
				</div>
				<div class="nr2">
	            <form method="post" action="manageresult.php">
	            
				<span>请输入你的评分：</span><input style="width:180px" = (condition) ? a : b ;" type="text" name="score" value="评分系统正在测试，即将上线" readonly="readonly"/>
				<button type="submit">已参加面试</button>
				</form>
				</div>
			</div>
		</div>
	</body>

</html>
EOT;
	}

} else {
	echo "<script>alert('请核对用户编号！'); history.go(-1);</script>";
}
?>