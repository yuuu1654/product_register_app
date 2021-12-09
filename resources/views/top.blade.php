@extends("layouts.app")

@section("title", "トップページ")

@section("header")
	<header>
		<div class="header-logo">
			<h2>ようこそ<?php //echo h($login_member["name_sei"]) ?><?php //echo h($login_member["name_mei"]) ?>さん</h2>
		</div>
		<div class="header-menus">
			<!-- 商品一覧ボタン -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='thread.php'" value="商品一覧">
			</div>
			<!-- 新規商品登録 -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='thread_regist.php'" value="新規商品登録">
			</div>
			<!-- マイページ -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='thread_regist.php'" value="マイページ">
			</div>
			<!-- ログアウト -->
			<form action="logout.php" class="button" method="POST">
				<input type="submit" class="btn btn-secondary btn-lg" name="logout" value="ログアウト">
			</form>
		</div>
	</header>
@endsection