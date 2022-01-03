@extends("layouts.app1")

@section("title", "トップページ")

@section("header")
	<header>
		<div class="header-logo">
			<h2>ようこそ {{ Auth::user()->name_sei }} {{ Auth::user()->name_mei }} さん</h2>
		</div>
		<div class="header-menus">
			<!-- 商品一覧ボタン -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('products.index') }}'" value="商品一覧">
			</div>
			<!-- 新規商品登録 -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('products.regist') }}'" value="新規商品登録">
			</div>
			<!-- マイページ -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='#'" value="マイページ">
			</div>
			<!-- ログアウト -->
			<form action="{{ route('members.logout') }}" class="button" method="POST">
				@csrf
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