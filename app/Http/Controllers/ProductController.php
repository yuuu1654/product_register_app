<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\ConfirmProductRequest;  //リクエストクラス

//保存する為にモデルを呼び出す
use App\Models\Member;
use App\Models\Product;
use App\Models\ProductCategory;
use App\Models\ProductSubcategory;

class ProductController extends Controller
{
    /**
     * 商品登録画面を表示する
     * @return view
     */
    public function new(Request $request){
        //商品登録フォーム用の変数
        $mode = "input";
        //セッションから会員のデータを取得: 戻ってきたときにフォームに値を表示する為
        $product =  $request->session()->get("form_input");

        //商品カテゴリの配列
        $category  = array();
        $category[1] = "選択して下さい";
        $category[2] = ProductCategory::find(1)->name;
        $category[3] = ProductCategory::find(2)->name;
        $category[4] = ProductCategory::find(3)->name;
        $category[5] = ProductCategory::find(4)->name;
        $category[6] = ProductCategory::find(5)->name;
        //session()->put("category", $category)  //セッションに保存
        //dd($category)->name;

        $subcategory = array();
        $subcategory[1] = ProductSubcategory::where("product_category_id", 1)->get();
        $subcategory[2] = ProductSubcategory::where("product_category_id", 2)->get();
        $subcategory[3] = ProductSubcategory::where("product_category_id", 3)->get();
        $subcategory[4] = ProductSubcategory::where("product_category_id", 4)->get();
        $subcategory[5] = ProductSubcategory::where("product_category_id", 5)->get();

        //dd($subcategory[1])->name;
        return view("products.regist", compact("mode", "product", "category", "subcategory"));
    }


    /**
     * バリデーションをかけてセッションに値を保存する
     * @param $request
     */
    public function confirm(ConfirmProductRequest $request){
        $product = $request->all();
        //セッションに値を保存する
        $request->session()->put("form_input", $product);
        return redirect("products/create");
    }


    /**
     * 確認画面を表示する
     * @return view
     */
    public function create(Request $request){
        //確認画面用の変数
        $mode = "confirm";
        //セッションから会員のデータを取得
        $product =  $request->session()->get("form_input");
        return view("products.regist", compact("mode", "product"));
    }
    

    /**
     * 会員情報を保存する
     * @param $request
     */
    public function store(Request $request){

        $product =  $request->session()->get("form_input");
        
        // 二重送信対策
        $request->session()->regenerateToken();

        //二重登録防止 : メールアドレスで検索して、登録されていなければ登録する
        $dup_member = Member::where("email", $member["email"])->first();
        if (is_null($dup_member)) {
            \DB::beginTransaction();
            try {
                //会員を登録
                Member::create($member);
                \DB::commit();
            } catch(\Throwable $e) {
                \DB::rollback();
                abort(500);
            }
        }
        $request->session()->forget("form_input");  //セッションを空にする
        return redirect("top");  //トップ画面に遷移
    }


    /**
     * 商品一覧画面を表示する
     * @return view
     */
    public function index(Request $request){
        return view("products.index");
    }
}
