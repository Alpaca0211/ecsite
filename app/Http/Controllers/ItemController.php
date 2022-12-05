<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Item;
use App\Favorite;

class ItemController extends Controller
{
    public function index() {
      $items = Item::orderBy('id', 'desc')->get();

      //お気に入りデータの取得
        if(Auth::check()){
          $favs = Favorite::where('user_id', Auth::id())->get();

          $fav_items = array();
          foreach ($favs as $fav){
            $fav_items[] = $fav->item_id;
          }
        }

      return view('index', [
        'items' => $items,
        'fav_items' => $fav_items
        ]);
    }

    public function view($item_id) {
      $item = Item::findOrFail($item_id);

      //お気に入りデータの取得
    if(Auth::Check()) {
      $fav = Favorite::where('user_id', Auth::id())->where('item_id',$item_id)->first();
      $fav_item = count($fav);
    }
      return view('item/item', [
        'item' => $item,
        'fav_item' => $fav_item,
      ]);
    }
}
