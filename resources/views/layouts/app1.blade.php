<?php
	//ホーム画面用のテンプレート
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="csrf-token" content="{{ csrf_token() }}">
	<title>@yield("title")</title>
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css" integrity="sha384-GJzZqFGwb1QTTN6wy59ffF1BuGJpLSa9DkKMp0DgiMDm4iYMj70gZWKYbI706tWS" crossorigin="anonymous">
	<style>
		body{
			background-color: #FFFFAA;
		}
		header{
			height: 80px;
			background-color: #FFCC99; 
		}
		.header-logo {
			float: left;
		}
		.header-logo h2 {
			line-height: 80px;
		}
		.header-menus {
			float: right;
		}
		.header-menus .button {
			float: left;
			
			padding: 20px 20px 0 0;
		}
		div.button{
			text-align: center;
		}
		main{
			background-color: #CCFFFF;
			
			padding-bottom: 300px;
			padding-top: 200px;
		}
		.container{
			text-align: center;
			padding-top: 200px;
			max-width: 600px;
			margin: 0px auto;
		}
		.table{
			text-align: center;
		}
		
		footer{
			height: 80px;
			margin-bottom: 0px;
			background-color: #FFCC99;
		}
		.footer-menus {
			float: right;
		}
		.footer-menus .button {
			float: left;
			padding: 20px 20px 0 0;
		}
	</style>
</head>
<body>
	@yield("header")
	@yield("main")
	@yield("footer")
</body>
</html>