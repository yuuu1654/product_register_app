@extends("layouts.app1")

@section("title", "トップページ")

@section("header")
	<header>
		<div class="header-logo">
			<h2>ようこそ {{ Auth::member()->name_sei }} {{ Auth::member()->name_sei }} さん</h2>
		</div>
		<div class="header-menus">
			<!-- 商品一覧ボタン -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('member.regist') }}'" value="商品一覧">
			</div>
			<!-- 新規商品登録 -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('member.regist') }}'" value="新規商品登録">
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

@section("main")
	@if (session("login_success"))  
		<div class="alert alert-success">
			{{ session("login_success") }}
		</div>
	@endif
@endsection