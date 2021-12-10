@extends("layouts.app2")

@section("title", "会員登録")


@section("main")
	<h1>会員情報登録フォーム</h1>
	<form action="{{route('members.store')}}" method="POST">
		@csrf
		<!-- 氏名 -->
		氏名  姓<input type="text" class="form-control" name="name_sei" value="<?php //echo $_SESSION["name_sei"] ?>">
					　　 名<input type="text" class="form-control" name="name_mei" value="<?php //echo $_SESSION["name_mei"] ?>"><br>
		ニックネーム　<input type="text" class="form-control" name="nickname" value="<?php //echo $_SESSION["name_sei"] ?>">
		<!-- 性別 -->
		性別
		<input type="radio" name="gender" value="1">男性</input>
		<input type="radio" name="gender" value="2">女性</input>

		
		<!-- パスワード -->
		パスワード　　　　<input type="password" class="form-control" name="password" value="<?php //echo $_SESSION["password"] ?>"><br>
		<!-- パスワード確認 -->
		パスワード確認　　<input type="password" class="form-control" name="password_confirmation" value="<?php //echo $_SESSION["password_confirmation"] ?>"><br>
		<!-- メールアドレス -->
		メールアドレス　　<input type="email" class="form-control" name="email" value="<?php //echo $_SESSION["email"] ?>"><br><br>
		<div class="button">
			<input type="submit" class="btn btn-primary btn-lg" name="confirm" value="確認画面へ"><br>
		</div>
	</form>
@endsection
