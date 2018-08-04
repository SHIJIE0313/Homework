<?php
//面试官注册配置文件 
header("charset=utf-8");
$account = $_POST["account"];
$password = $_POST["pwd"];
$mingzi = $_POST["mingzi"];
$pin = $_POST["PIN"];
$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
mysqli_query($firstsql, "set names utf8;");
if ($pin != 201806) {
	echo "<script>alert('错误代码：00。请核对你的授权码，如有疑问，请联系管理员！'); history.go(-1);</script>";
} else {
	if ($account == "" || $password == "" || $mingzi == "") {
		echo "<script>alert('错误代码：01。请保证表单数据完整，合法'); history.go(-1);</script>";
	} else {
		$sql = "INSERT INTO account(account,password,mingzi,pin) 
VALUES ('$account','$password','$mingzi','$pin')";
		mysqli_query($firstsql, $sql);
		if (mysqli_affected_rows($firstsql) > 0) {
			echo "<script>alert('注册成功，点击确认返回管理系统主页！');window.location.href='GL.html'</script>";
		} else {
			echo "<script>alert('错误代码：02。注册失败，请联系管理员！');  history.go(-1);</script>";
		}
	}
}
?>
