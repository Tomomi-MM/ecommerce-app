<?php

namespace App\Http\Controllers;

use App\Models\Cart;                      // カートモデル
use App\Models\CartItem;                  // カートアイテムモデル
use App\Models\Product;                   // 商品モデル
use Illuminate\Support\Facades\Auth;      // 認証情報の取得
use Illuminate\Http\Request;

class CartController extends Controller
{
    // カートの表示
    public function index()
    {
        $cart = auth()->user()->cart;
        $cartItems = $cart ? $cart->cartItems()->with('product')->get() : [];

        return view('cart.index', compact('cartItems'));
    }

    // カートに商品を追加
    public function store(Request $request)
    {
        // 現在のユーザーを取得
        $user = auth()->user();

        // カートを取得または新規作成
        $cart = $user->cart ?? $user->cart()->create();

        // カートに商品を追加
        $cart->cartItems()->create([
            'product_id' => $request->input('product_id'),
        ]);

        return redirect()->route('cart.index')->with('success', 'カートに商品を追加しました！');
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
