<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // カートの表示
    public function index()
    {
        $cartItems = session()->get('cart', []); // セッションからカート情報を取得
        return view('cart.index', compact('cartItems'));
    }

    // カートに商品を追加
    public function store(Request $request)
    {
        $product = Product::findOrFail($request->product_id);

        $cart = session()->get('cart', []);

        if (isset($cart[$product->id])) {
            $cart[$product->id]['quantity'] += $request->quantity;
        } else {
            $cart[$product->id] = [
                'name' => $product->name,
                'price' => $product->price,
                'quantity' => $request->quantity,
            ];
        }

        session()->put('cart', $cart);

        return redirect()->route('cart.index')->with('success', '商品をカートに追加しました！');
    }

    // カートから商品を削除
    public function destroy($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]); // 商品を削除
            session()->put('cart', $cart); // セッションを更新
        }

        return redirect()->route('cart.index')->with('success', '商品を削除しました！');
    }
}
