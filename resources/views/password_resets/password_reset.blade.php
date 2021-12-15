@extends("layouts.app2")

@section("title", "パスワード再設定")


@php
	//$mode = "input";
@endphp


@if ( $mode == "input" )
	<!-- メールアドレス入力画面 -->
	@section("main")
		<!-- パスワード再設定フォーム画面 -->
		<div class="container">
			<div class="mx-auto" style="width:500px;">
				<p style="margin-bottom: 100px;">
				パスワード再設定用の URL を記載したメールを送信します。<br>
				ご登録されたメールアドレスを入力してください。																					
				</p>
				<!-- エラーメッセージがあれば表示する -->
				@if ($errors->any())  
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							{{ $error }}<br>
						@endforeach
					</div>
				@endif
				<form action="{{ route('password_resets.send') }}" method="post">
					@csrf
					<!-- メールアドレスのみ初期値を表示する -->
					<p>
						メールアドレス　　　<input type="email"　class="form-control" name="email" value="{{ old('email') }}"><br>
					</p>
					<div class="button">
						<input type="submit" class="btn btn-primary btn-lg" style="margin-top: 100px;" name="" value="    送信する    ">
					</div>
				</form>
				<div class="button">
					<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('/') }}'" value="トップに戻る">
				</div>
			</div>
		</div>
	@endsection
@elseif ( $mode == "done" )
	<!-- 完了画面 -->
	@section("main")
		<div class="container">
			<p style="margin-bottom: 100px;">
				"パスワード再設定の案内メールを送信しました 。<br>
				（ まだパスワード再設定は完了しておりません ）<br>
				届きましたメールに記載されている <br>
				『パスワード再設定URL』 をクリックし、<br>
				パスワードの再設定を完了させてください。"	<br>																									
			</p>
		</div>
		<div class="button">
			<input type="submit" class="btn btn-primary btn-lg" onclick="location.href='{{ route('/') }}'" value="トップに戻る">
		</div>
	@endsection
@else
	<!-- パスワード再設定フォーム画面 -->
	@section("main")
		<!-- ログインフォーム画面 -->
		<div class="container">
			<div class="mx-auto" style="width:500px;">
				<!-- エラーメッセージがあれば表示する -->
				@if ($errors->any())  
					<div class="alert alert-danger">
						@foreach ($errors->all() as $error)
							{{ $error }}<br>
						@endforeach
					</div>
				@endif
				<form action="{{ route('password_resets.password_reset') }}" method="post">
					@csrf
					<p>
						パスワード　　　　　　　<input type="password" class="" name="password" value="{{ old('password') }}"><br>
					</p>
					<p style="padding-bottom: 100px;">
						パスワード確認　　　　　<input type="password" class="" name="password_confirmation" value="{{ old('password_confirmation') }}"><br>
					</p>
					<div class="button">
						<input type="submit" class="btn btn-primary btn-lg" style="margin-top: 100px;" name="" value="パスワードリセット">
					</div>
				</form>
				<div class="button">
					<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('/') }}'" value="トップに戻る">
				</div>
			</div>
		</div>
	@endsection
@endif

