@extends("layouts.app2")

@section("title", "ログイン")

@section("main")
	<!-- ログインフォーム画面 -->
	<div class="container">
		<div class="mx-auto" style="width:400px;">
			<h1>ログイン</h1><br>
			<!-- エラーメッセージがあれば表示する -->
			@if ($errors->any())  
				<div class="alert alert-danger">
					@foreach ($errors->all() as $error)
						{{ $error }}<br>
					@endforeach
				</div>
			@endif
			<form action="top.php" method="post">
				@csrf
				<!-- メールアドレスのみ初期値を表示する -->
				<p>
					メールアドレス（ID）<input type="email" class="" name="email" value="{{ old('email') }}"><br>
				</p>
				<p>
					パスワード　　　　　<input type="password" class="" name="password" value=""><br>
				</p>
				　　　　　　　　　　　<a href="{{ route('password_resets') }}">パスワードを忘れた方はこちら</a>
				<div class="button">
					<input type="submit" class="btn btn-primary btn-lg" style="margin-top: 100px;" name="login" value="ログイン">
				</div>
			</form>
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('/') }}'" value="トップに戻る">
			</div>
		</div>
	</div>
@endsection
