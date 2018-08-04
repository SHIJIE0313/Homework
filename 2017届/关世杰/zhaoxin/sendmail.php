<?php
//邮件发送配置文件 不会改勿动
session_start();
$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
mysqli_query($firstsql, "set names utf8;");
$name = $_SESSION["name"];
$mail=$_SESSION["mail"];
$ID = "select ID from test where name='$name'";
$result = mysqli_query($firstsql, $ID);
$row = mysqli_fetch_row($result);
require_once 'qqmail.php';
// 实例化 QQMailer
$mailer = new QQMailer(true);
// 添加附件
//$mailer->addFile('20130VL.jpg');
// 邮件标题
$title = '恭喜你，报名成功';
// 邮件内容
$content = <<< EOF
<p align="center">
测试成功<br>
你的报名编号为：$row[0]<br>
Powered By Youngon<p>
EOF;
// 发送QQ邮件
$mailer -> send($mail, $title, $content);
print <<<EOT
	<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title></title>
	</head>
	<body>
		<script>
			location.replace("result.php");
		</script>
	</body>
</html>
EOT;
?>