@extends("layouts.app1")

@section("title", "トップページ")

@section("header")
	<header>
		<div class="header-menus">
			<!-- 商品一覧ボタン -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='thread.php'" value="商品一覧">
			</div>
			<!-- 新規会員登録 -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('member.regist') }}'" value="新規会員登録">
			</div>

			<form method="GET" action="{{ route('member.regist') }}">
				<button type="submit" class="btn btn-primary">
					新規登録
				</button>
			</form>
			<!-- ログイン -->
			<form action="#" class="button" method="POST">
				@csrf
				<input type="submit" class="btn btn-secondary btn-lg" name="login" value="ログイン">
			</form>
		</div>
	</header>
@endsection