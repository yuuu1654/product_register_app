@extends("layouts.app2")

@section("title", "商品登録")

@section("ajax")
<script>
		$('#button').click(
			function(){
				$.ajax({
					type: "GET",
					url: "{{ route('members.regist') }}",
					dataType: "php",
				}).done(function (result){
					//成功
					alert("成功しました");
				}).fail(function (err){
					//失敗
					alert("ファイル取得に失敗しました。");
				});
			}
		);
	</script>
@endsection


@if ( $mode == "input" )
	<!-- フォーム画面 -->
	@section("main")
	
		@php
			
		@endphp

		<h1>　　　　　商品登録</h1>
		<!-- エラーがあるかどうかでフォームを分岐 -->
		@if ($errors->any())  
			<!-- エラーがある時->エラー文&前の入力の表示 -->
			<div class="alert alert-danger">
				@foreach ($errors->all() as $error)
					{{ $error }}<br>
				@endforeach
			</div>
			<form action="{{route('products.confirm')}}" method="POST">
				@csrf
				<!-- 商品名 -->
				商品名　　　　<input type="text" class="form-control" name="name" value="{{ old('name') }}"><br>
				<!-- 商品カテゴリ -->
				商品カテゴリ
				
				<!-- 商品写真 -->
				商品写真<br>

				<!-- 商品説明 -->
				商品説明　　　<textarea class="form-control" name="product_content" value="">{{ old('product_content') }}</textarea>
				<div class="button">
					<input type="submit" class="btn btn-primary btn-lg" name="confirm" value="確認画面へ"><br>
				</div>
			</form>
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('top') }}'" value="トップに戻る">
			</div>




		@else　<!-- エラーがない時 : デフォルト画面->セッションの値を表示する -->
			<form action="{{route('products.confirm')}}" method="POST" enctype="multipart/form-data">
				@csrf
				<!-- 商品名 -->
				商品名　　　　<input type="text" class="form-control" name="name" value="{{ old('name') }}"><br>
				<!-- 商品カテゴリ -->
				商品カテゴリ <br>
				<select name="product_category" class="form-control">
					@foreach( $category as $i => $v )
						@if( $product["product_category_id"] == $i )
							<option value="{{ $i }}" selected>{{ $v }}</option>

							
							@if( $i != 1 ) <!-- カテゴリが選択されている時はサブカテゴリのセレクトボックスを表示 -->
								<select name="product_subcategory" class="form-control">
									@foreach( $subcategory as $i => $v )
										@if( $product["product_subcategory_id"] == $i )
											<option value="{{ $i }}" selected>{{ $v }}</option>
										@else
											<option value="{{ $i }}" >{{ $v }}</option>
										@endif
									@endforeach
								</select>
							@endif


						@else
							<option value="{{ $i }}" >{{ $v }}</option>
						@endif
					@endforeach
				</select><br>
				
				<!-- 商品写真 -->
				商品写真 <br><br>
				写真1 <br>
				<input type="file" class="form-control-file" name="image_1" id="image_1" accept=".png,.jpg,.jpeg,.gif"><br>
				<button type="submit" id="button_1" class="btn btn-outline-warning btn-sm">アップロード</button><br>

				写真2 <br>
				<input type="file" class="form-control-file" name="image_2" accept=".png,.jpg,.jpeg,.gif"><br>
				<button type="submit" class="btn btn-outline-warning btn-sm">アップロード</button><br>

				写真3 <br>
				<input type="file" class="form-control-file" name="image_3" accept=".png,.jpg,.jpeg,.gif"><br>
				<button type="submit" class="btn btn-outline-warning btn-sm">アップロード</button><br>

				写真4 <br>
				<input type="file" class="form-control-file" name="image_4" accept=".png,.jpg,.jpeg,.gif"><br>
				<button type="submit" class="btn btn-outline-warning btn-sm">アップロード</button><br>

				<!-- 商品説明 -->
				商品説明　　　<textarea class="form-control" name="product_content" value="">{{ old('product_content') }}</textarea>
				<div class="button">
					<input type="submit" class="btn btn-primary btn-lg" name="confirm" value="確認画面へ"><br>
				</div>
			</form>
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('top') }}'" value="トップに戻る">
			</div>


			<!-- Ajaxサンプル -->
			<input type="button" id="button" value="「members/regist.blade.php」取得" />
			<br>
			<div id="text"></div>
		@endif
	@endsection
@elseif ( $mode == "confirm" )
	<!-- 確認画面 -->
	@section("main")
		
		<div class="container">
			<h1>商品登録確認画面</h1>
		</div>
		<form action="{{ route('products.store') }}" method="post">
			@csrf
			商品名　　　　　　{{ $product["name"] }}<br>
			商品カテゴリ　　　{{ $product }}<br>
			商品写真　　　　　{{ $product }}<br>

			商品説明　　　　　{{ $product["product_content"] }}<br>
			<div class="button">
				<input type="submit" class="btn btn-primary btn-lg" name="" value="商品を登録する"><br>
			</div>
		</form>
		<form method="GET" action="{{ route('products.regist') }}">
			<div class="button">
				<input type="submit" class="btn btn-secondary btn-lg" onclick="location.href='{{ route('products.regist') }}'" value="前に戻る">
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


