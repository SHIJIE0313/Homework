<?php
//表单处理页面，核心组件***
error_reporting(0);
session_start();
header("charset=utf-8");
$name = $_POST["name"];
$_SESSION["name"] = $name;
$sex = $_POST["sex"];
$province = $_POST["province"];
$city = $_POST["city"];
$phone = $_POST["phone"];
$schoolclass = $_POST["select"];
$idnum = $_POST["idnum"];
$mail = $_POST["mail"];
$_SESSION["mail"] = $mail;
$suggest = $_POST["suggest"];
$select1 = $_POST["select1"];
$select2 = $_POST["select2"];
$select3 = $_POST["select3"];
$_SESSION["time"] = $select3;
$skill = $_POST["skill"];
$skillstr = implode(",", $skill);
$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
mysqli_query($firstsql, "set names utf8;");
$pin = 0;
$manageid="未参加初试";
$pattern = "/([a-z0-9]*[-_.]?[a-z0-9]+)*@([a-z0-9]*[-_]?[a-z0-9]+)+[.][a-z]{2,3}([.][a-z]{2})?/i";
// 检测连接
//if ($firstsql -> connect_error) {
//	die("数据库连接失败: " . $firstsql -> connect_error);
//}

//function check_input($name) {
//	//对特殊符号添加反斜杠
//	$name = addslashes($name);
//	//判断自动添加反斜杠是否开启
//	if (get_magic_quotes_gpc()) {
//		//去除反斜杠
//		$name = stripslashes($name);
//	}
//	//把'_'过滤掉
//	$name = str_replace("_", "\_", $name);
//	//把'%'过滤掉
//	$name = str_replace("%", "\%", $name);
//	//把'*'过滤掉
//	$name = str_replace("*", "\*", $name);
//	//回车转换
//	$name = nl2br($name);
//	//去掉前后空格
//	$name = trim($name);
//	//将HTML特殊字符转化为实体
//	$name = htmlspecialchars($name);
//	return $name;
//}
//check_input();
//一个简单的合法性检验
$checkname = preg_match('/[' . chr(0xa1) . '-' . chr(0xff) . ']/', $name);
$checkphonenum = preg_match('/[0-9]/', $phone);
$checkidnum = preg_match('/[0-9]/', $idnum);
$checkmail = preg_match($pattern, $mail);
//检测前四位是否为2018 确认大一 但不能信任用户输入的内容 无法确认真实性 没有学校新生数据库
$idnumfour = substr($idnum, 0, 4);
if ($name == null || $sex == null || $phone == null || $schoolclass == "none" || $idnum == null || $suggest == null || $select1 == "none" || $select2 == "none" || $select3 == "请选择") {
	echo "<script>alert('请将信息填充完整！'); history.go(-1);</script>";
} elseif (!$checkname) {
	echo "<script>alert('请输入正确姓名'); history.go(-1);</script>";
} elseif ($sex != "男" && $sex != "女") {
	echo "<script>alert('请输入正确性别'); history.go(-1);</script>";
} elseif (!$checkphonenum || strlen($phone) != 11) {
	echo "<script>alert('请输入正确手机号'); history.go(-1);</script>";
} elseif (!$checkidnum || strlen($idnum) != 8 || $idnumfour != 2018) {
	echo "<script>alert('请输入正确学号并确保你是大一新生'); history.go(-1);</script>";
} elseif (!$checkmail) {
	echo "<script>alert('请输入正确邮箱'); history.go(-1);</script>";
} else {
	$sql = "INSERT INTO test(name,sex,province,city,phone,schoolclass,idnum,select1,select2,skill,suggest,select3,pin,manageid) 
VALUES ('$name','$sex','$province','$city','$phone','$schoolclass','$idnum','$select1','$select2','$skillstr','$suggest','$select3','$pin','$manageid')";
	mysqli_query($firstsql, $sql);
	//写入检测
	$row = mysqli_affected_rows($firstsql);
	if ($row > 0) {

		print <<<EOT
		<!DOCTYPE html>
	<html>
		<head>
			<meta charset="UTF-8">
			<title></title>
		</head>
		<body>
			<script>
				location.replace("sendmail.php");
			</script>
		</body>
	</html>
EOT;
	} else {
		echo "数据写入失败";
	}
}
//正则式检测的源代码
//function checkStr($str)
//{
//	$output='';
//	$a=preg_match('/['.chr(0xa1).'-'.chr(0xff).']/', $str);
//	$b=preg_match('/[0-9]/', $str);
//	$c=preg_match('/[a-zA-Z]/', $str);
//	if($a && $b && $c)
//		$output='汉字数字英文的混合字符串';
//	elseif($a && $b && !$c)
//		$output='汉字数字的混合字符串';
//	elseif($a && !$b && $c)
//		$output='汉字英文的混合字符串';
//	elseif(!$a && $b && $c)
//		$output='数字英文的混合字符串';
//	elseif($a && !$b && !$c)
//		$output='纯汉字';
//	elseif(!$a && $b && !$c)
//		$output='纯数字';
//	elseif(!$a && !$b && $c)
//		$output='纯英文';
//	return $output;
//}
?>

