<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;

class ProductController extends Controller
{

      // 商品詳細の表示
      public function show($id)
      {
        // 商品を取得（リレーションでカテゴリーも取得）
        $product = Product::with('category')->findOrFail($id); // ID で商品を取得、見つからない場合は404エラー
        return view('products.show', compact('product')); // ビューにデータを渡す
      }

      //商品登録フォームを表示
      public function create()
      {
          // カテゴリーを取得してビューに渡す
          $categories = Category::all();

          return view('products.create', compact('categories'));
      }

      //商品を保存する
      public function store(Request $request)
    {
        // バリデーション
        $request->validate([
            'product_name' => 'required|string|max:255',
            'description' => 'required|string',
            'price' => 'required|integer|min:0',
            'img' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048', // 画像ファイルのバリデーション
            'category_id' => 'required|exists:categories,id',
        ]);

        // 画像ファイルを保存
        $path = $request->file('img')->store('images', 'public'); // 'storage/app/public/images' に保存

        // 商品をデータベースに保存
        $product = new Product();
        $product->product_name = $request->input('product_name');
        $product->description = $request->input('description');
        $product->price = $request->input('price');
        $product->img = $path; // ファイルパスを保存
        $product->category_id = $request->input('category_id');
        $product->save();

        return redirect()->route('products.create')->with('success', '商品が保存されました。');
    }
}
