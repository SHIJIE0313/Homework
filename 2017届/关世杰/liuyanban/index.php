<!DOCTYPE html>
<html lang="zh-CN">

	<head>
		<meta charset="utf-8" />
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">
		<title>留言板</title>
		<link rel="stylesheet" href="css/new_file.css" />
	</head>

	<body>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 a1">
					<h1>留言板</h1>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 a1">
					<?php

					$firstsql = mysqli_connect("localhost", "GSJ", "19990313", "gsj");
					mysqli_query($firstsql, "set names utf8;");
					$sql = "select * from liuyanban";
					$rs = mysqli_query($firstsql, $sql);
					while ($row = mysqli_fetch_array($rs))
						echo "$row[name]  $row[text] <br />";
					?>
				</div>
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12 a1">
					<form action="new_file.php" method="post">
						<p>
							姓名
						</p>
						<input type="text" name="name" />
						<p>
							留言内容
						</p>
						<input type="text" name="text" />
						<br />
						<button type="submit" style="margin-top: 10px;">
						提交
						</button>
					</form>
				</div>
			</div>
		</div>

		<script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
	</body>

</html>