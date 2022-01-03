@extends("layouts.app1")

@section("title", "トップページ")

@section("header")
	<header>
		<div class="header-menus">
			<!-- 商品一覧ボタン -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('products.index') }}'" value="商品一覧">
			</div>
			<!-- 新規会員登録 -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('members.regist') }}'" value="新規会員登録">
			</div>
			<!-- ログイン -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('members.login') }}'" value="ログイン">
			</div>
		</div>
	</header>
@endsection

@section("main")
	@if (session("logout_success"))  
		<div class="alert alert-success">
			{{ session("logout_success") }}
		</div>
	@endif
@endsection