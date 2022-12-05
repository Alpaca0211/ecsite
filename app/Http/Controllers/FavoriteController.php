<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Favorite;

//お気に入りに登録する
class FavoriteController extends Controller
{
    public function add($item_id) {
      if(Auth::check()) {
        //すでに登録されている場合は削除
        $favorite = new Favorite;
        $already = $favorite->where('user_id', Auth::id())->where('item_id', $item_id)->first();
        if($already){
          //削除
          $already->delete();
        }else{
          //追加
          $favorite->user_id = Auth::id();
          $favorite->item_id = $item_id;
          $favorite->save();
        }
        return redirect('/item/'.$item_id);
      } else {
        return redirect('/login');
      }
    }
}
