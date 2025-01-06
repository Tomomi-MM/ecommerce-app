<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class OrderController extends Controller
{
    // 注文確認ページの表示
    public function create()
    {
        $cartItems = session()->get('cart', []); // カート情報を取得
        return view('checkout.create', compact('cartItems'));
    }

    // 注文を確定
    public function store(Request $request)
    {
        $order = new Order();
        $order->user_id = auth()->id(); // 現在のログインユーザー
        $order->total_price = $request->total_price;
        $order->save();

        // カート情報を注文アイテムに保存する処理（省略）

        session()->forget('cart'); // カートをクリア

        return redirect()->route('orders.index')->with('success', '注文を確定しました！');
    }

    // 注文履歴の表示
    public function index()
    {
        $orders = auth()->user()->orders; // 現在のユーザーの注文履歴
        return view('orders.index', compact('orders'));
    }
}
