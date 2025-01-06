<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;

class HomeController extends Controller
{
    public function index()
    {
         // 商品一覧を取得し、カテゴリー情報も一緒にロード
         $products = Product::with('category')->get();

         // ビューにデータを渡す
         return view('home', compact('products'));
    }
}
