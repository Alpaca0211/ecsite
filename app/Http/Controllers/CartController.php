<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Cart;

class CartController extends Controller
{
  function index(){
    if(Auth::check()){
      $carts = Cart::getCartItems(Auth::id());

      //合計金額
      $sum = 0;
      foreach ($carts as $cart){
        $sum += $cart->price * $cart->count;
      }
      return view('cart/index',[
        'carts' => $carts,
        'sum' => $sum,
      ]);
    }else{
      return redirect('/login');
    }
  }
// 追加
  public function add(Request $request, $item_id){
    if(Auth::check()) {
      Cart::buy(Auth::id(), $item_id, $request->input('unit'));
      return redirect('/cart');
    }else{
      return redirect('/login');
    }
  }
//削除
  function delete(Request $request){
    if (Auth::check()){
      $cart = new Cart;
      $cart->where('user_id', Auth::id())
        ->where('item_id', $request->input('item_id'))
        ->delete();
    }
    return redirect('/cart');
  }
  //変更
 function update(Request $request){
    if (Auth::check()){
      // カートのアイテムの変更
      $cart = new Cart;
      $cart->where('user_id', Auth::id())
        ->where('item_id', $request->input('item_id'))
        ->update(['count'=>$request->input('unit')]);
    return redirect('/cart');
  }else{
    return redirect('login');
  }
} 
}
