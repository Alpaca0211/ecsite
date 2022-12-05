<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Cart extends Model
{
  static function getCartItems($user_id){
    $carts = DB::table('carts')
      ->join('items', 'item_id', '=', 'items.ID')
      ->where('carts.user_id', '=', $user_id)
      ->select('items.*', 'carts.count')
      ->get();

   return $carts;
  }

  static function buy($user_id, $item_id, $count){
    $cart = new Cart;
    $cart_item = $cart->where('user_id', $user_id)
     ->where('item_id', $item_id)
     ->first();

  if ($cart_item) {
    //変更
    $count = $cart_item->count + $count;
    $count = ($count <=5? $count:5);
    $cart_item->count = $count;
    return $cart_item->save();
  }else{
    //追加
    $cart->user_id = $user_id;
    $cart->item_id = $item_id;
    $cart->count = $count;
    return $cart->save();
  }
}
}
