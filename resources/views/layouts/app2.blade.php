<?php
	//登録&編集・確認画面用のテンプレート(header無し)
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield("title")</title>
	<!-- Bootstrapの読み込み -->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>　<!-- ajax/jQuery -->
	@yield("ajax")
	<style>
		body{
			padding: 10px;
			max-width: 600px;
			margin: 0px auto;
			background-color: #FFFFAA;
		}
		div.button{
			text-align: center;
		}
		.container{
			text-align: center;
			padding-top: 150px;
		}
		.done{
			padding-top: 50px;
		}
		.btn{
			margin: 20px 0 20px 0;  
			padding: 10px 40px 10px 40px;
		}
		h1{
			padding-bottom: 50px;
		}
		.conf_form{
			padding-left: 130px;
		}
	</style>
</head>
<body>
	@yield("header")
	@yield("main")
	@yield("footer")
</body>
</html>

