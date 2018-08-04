<?php
//这个页面是编号页面，会核对面试官相关信息
header("charset=utf-8");
session_start();
$admin = $_POST["ADMINNUM"];
$_SESSION["admin"] = $admin;
$PWD = $_POST["password"];
$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
mysqli_query($firstsql, "set names utf8;");
$pwdcheck = "select password from account where account='$admin'";
$result = mysqli_query($firstsql, $pwdcheck);
$row = mysqli_fetch_assoc($result);
if ($row["password"] == $PWD) {
	print <<<EOT
	<!DOCTYPE html>
<!DOCTYPE html>
<html>

	<head>
		<meta charset="UTF-8">
		<title>阳光网站面试报名管理系统</title>
		<style>
			* {
				padding: 0;
				margin: 0;
			}
			
			.head {
				width: 800px;
				height: 50px;
				margin: 0 auto;
			}
			
			h3 {
				display: inline;
			}
			
			.body {
				padding-top: 50px;
				width: 800px;
				height: 200px;
				margin: 0 auto;
				text-align: center;
			}
			
			h1 {
				text-align: center;
				line-height: 50px;
			}
			
			input {
				width: 150px;
				height: 25px;
				border: 1px solid;
				margin-left: 5px;
				margin-top: 5px;
			}
			
			button {
				width: 100px;
				height: 30px;
				margin: 0 auto;
				background-color: #6495ED;
				border: none;
				color: white;
				margin-top: 20px;
			}
		</style>
	</head>

	<body>
		<div class="head">
			<h1>阳光网站面试管理系统</h1>
		</div>
		<div class="body">
			<form method="post" action="GLmanage.php">
				<h3>用户编号</h3><input type="text" name="Id" placeholder="请输入合法用户编号" />
				<br />
				<button type="submit">查询</button>
			</form>
		</div>
	</body>

</html>
EOT;
} else {
	echo "<script>alert('请核对你的账号和密码！'); history.go(-1);</script>";
}
?>

