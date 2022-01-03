@extends("layouts.app1")

@section("title", "商品一覧")

@section("header")
	<header style="padding-bottom: 0px;">
		<div class="header-logo">
			<h2>商品一覧</h2>
		</div>
		<div class="header-menus">
			<!-- 新規商品登録 -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('products.regist') }}'" value="新規商品登録">
			</div>
		</div>
	</header>
@endsection

@section("main")
	<div class="container">
		<!-- 検索フォーム -->
		<form action="" method="GET">
			<table class="table">
				<tr>
					<th>カテゴリ</th>
					<td>
						<input type="text" class="form-control" name="id" value=""><br>
						<input type="text" class="form-control" name="id" value="">
					</td><br>
				</tr>
				<tr>
					<th>フリーワード</th>
					<td><input type="text" class="form-control" name="word" value=""></td>
				</tr>
			</table>
			<!-- 検索ボタン -->
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" name="search" value="　　商品検索　　"><br>
			</div>
		</form>
	</div>
@endsection