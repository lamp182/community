<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	恭喜您注册成功：<h3>{{ $email }}</h3>,点击<a href="{{ url("home/zhuce/jihuo?id=".$id."&token=".$token) }}">激活</a>您好!欢迎来到17173游戏论坛。
</body>
</html>