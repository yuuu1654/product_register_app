@extends("layouts.app2")

@section("title", "会員登録")


@if ( $mode == "input" )
	<!-- フォーム画面 -->
	@section("main")
	
		@php
			//性別のラジオボタン
			$gender = array();
			$gender[1] = "男性";
			$gender[2] = "女性";
		@endphp

		<h1>会員情報登録フォーム</h1>
		<!-- エラーがあるかどうかでフォームを分岐 -->
		@if ($errors->any())  
			<!-- エラーがある時->エラー文&前の入力の表示 -->
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
					{{ $error }}<br>
				@endforeach
			</div>
			<form action="{{route('members.confirm')}}" method="POST">
				@csrf
				<!-- 氏名 -->
				氏名  姓<input type="text" class="form-control" name="name_sei" value="{{ old('name_sei') }}">
							　　 名<input type="text" class="form-control" name="name_mei" value="{{ old('name_mei') }}"><br>
				ニックネーム　<input type="text" class="form-control" name="nickname" value="{{ old('nickname') }}"><br>
				<!-- 性別 -->
				性別
				@foreach ($gender as $i => $v)
					@if( old('gender') == $i )
						<label><input type="radio" name="gender" value="{{ $i }}" checked>{{ $v }}</label><br>
					@else
						<label><input type="radio" name="gender" value="{{ $i }}" >{{ $v }}</label><br>
					@endif
				@endforeach
				<!-- パスワード -->
				パスワード　　　　<input type="password" class="form-control" name="password" value="{{ old('password') }}"><br>
				<!-- パスワード確認 -->
				パスワード確認　　<input type="password" class="form-control" name="password_confirmation" value="{{ old('password_confirmation') }}"><br>
				<!-- メールアドレス -->
				メールアドレス　　<input type="email" class="form-control" name="email" value="{{ old('email') }}"><br><br>
				<div class="button">
					<input type="submit" class="btn btn-primary btn-lg" name="confirm" value="確認画面へ"><br>
				</div>
			</form>
		@else　<!-- エラーがない時->セッションの値を表示する -->
			<form action="{{route('members.confirm')}}" method="POST">
				@csrf
				<!-- 氏名 -->
				氏名  姓<input type="text" class="form-control" name="name_sei" value="{{ $member['name_sei'] }}">
							　　 名<input type="text" class="form-control" name="name_mei" value="{{ $member['name_mei'] }}"><br>
				ニックネーム　<input type="text" class="form-control" name="nickname" value="{{ $member['nickname'] }}"><br>
				<!-- 性別 -->
				性別
				@foreach ($gender as $i => $v)
					@if( $member['gender'] == $i )
						<label><input type="radio" name="gender" value="{{ $i }}" checked>{{ $v }}</label><br>
					@else
						<label><input type="radio" name="gender" value="{{ $i }}" >{{ $v }}</label><br>
					@endif
				@endforeach
				<!-- パスワード -->
				パスワード　　　　<input type="password" class="form-control" name="password" value="{{ $member['password'] }}"><br>
				<!-- パスワード確認 -->
				パスワード確認　　<input type="password" class="form-control" name="password_confirmation" value="{{ $member['password_confirmation'] }}"><br>
				<!-- メールアドレス -->
				メールアドレス　　<input type="email" class="form-control" name="email" value="{{ $member['email'] }}"><br><br>
				<div class="button">
					<input type="submit" class="btn btn-primary btn-lg" name="confirm" value="確認画面へ"><br>
				</div>
			</form>
		@endif
	@endsection
@elseif ( $mode == "confirm" )
	<!-- 確認画面 -->
	@section("main")
		@if ($member["gender"] === 1)
			@php $gender = "男性" @endphp
		@else
			@php $gender = "女性" @endphp 
		@endif
		<div class="container">
			<h1>会員情報確認画面</h1>
		</div>
		<form action="{{ route('members.store') }}" method="post">
			@csrf
			氏名　　　　　　{{ $member["name_sei"] }}　{{ $member["name_mei"] }}<br>
			ニックネーム　　{{ $member["nickname"] }}<br>
			性別　　　　　　{{ $gender }}<br>
			パスワード　　　セキュリティのため非表示<br>
			メールアドレス　{{ $member["email"] }}<br>
			<div class="button">
				<input type="submit" class="btn btn-primary btn-lg" name="signup_done" value="登録完了"><br>
			</div>
		</form>
		<form method="GET" action="{{ route('members.regist') }}">
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('members.regist') }}'" value="前に戻る">
			</div>
		</form>
	@endsection
@else
	<!-- 完了画面 -->
	@section("main")
		<div class="container">
			<h1>会員登録完了</h1>
			<p class="done">会員登録が完了しました。</p>
		</div>
		<div class="button">
			<input type="submit" class="btn btn-primary btn-lg" onclick="location.href='{{ route('/') }}'" value="トップに戻る">
		</div>
	@endsection
@endif

