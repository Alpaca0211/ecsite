@extends('layouts.app')

@section('header')
<link rel="stylesheet" href="/css/cart.css">
<link rel="stylesheet" href="/css/cart_sp.css">
@endsection

@section('content')
<nav class="breadCrumb">
  <ul class="section">
    <li><a href="#">TOP</a></li>
    <li><span>ショッピングカート</span></li>
  </ul>
</nav>

  <!-- ページ見出し -->
  <div class="heading section">
    <h1>SHOPPING CART<span>ショッピングカート</span></h1>
  </div>

  <div action="#" class="form">

  <!-- Mod: テーブルモジュール -->
  <section class="cartTableModule section">
    <table id="cartTable">
      <tr class="head">
        <th colspan="2">商品名</th>
        <th>サイズ</th>
        <th>数量</th>
        <th>価格</th>
        <th></th>
      </tr>
      @foreach ($carts as $item)
      <tr>
        <td class="image"><img src="{{ $item->picture01 }}" alt=""></td>
        <td class="name">{{ $item->name }}</td>
        <td class="size">
          <label>
            <select name="size" id="">
              <option value="S" selected>S</option>
              <option value="M(在庫切れ)">M</option>
              <option value="L">L</option>
            </select>
          </label>
        </td>
        <td class="unit">
          <label>
            <form action="" method="post">
              {{ csrf_field() }}
              <input type="hidden" name="_method" value="put">
              <input type="hidden" name="item_id" value="{{ $item->id }}">
            <select name="unit" id="">
              @for ($i=1; $i<=5; $i++)
                @if ($i == $item->count)
                  <option value="{{ $i }}" selected>{{ $i }}</option>
                @else
                  <option value="{{ $i }}">{{ $i }}</option>
                @endif
              @endfor
            </select>
            </form>
          </label>
        </td>
        <td class="price">
          <span>{{ number_format($item->price * $item->count) }}</span>円
        </td>
        <td class="action">
          <form action="" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="_method" value="delete">
            <input type="hidden" name="item_id" value="{{ $item->id }}">
          <button type="submit" class="removeButton button blue ghost small">削除</button>
        </form>
        </td>
      </tr>
      @endforeach
    </table>
  </section>


  <!-- Mod: 合計金額モジュール -->
  <section class="totalPriceModule section">
    <dl>
      <dt>ご注文価格合計</dt>
      <dd><span id="totalPrice">{{ number_format($sum) }}</span>円</dd>
    </dl>
  </section>


  <!-- Mod: ボタンモジュール -->
  <section class="buttonModule section">
    <a href="index.html" class="button blue ghost">買い物を続ける</a>
    <button class="button blue" id="submitButton">ご購入手続きへ</button>
  </section>
</div>



<div id="cover" class="cover"></div>
<div class="modal" id="modal">
  <div class="title">注文内容の確認</div>
  <div class="body">
    <!--
    <ul class="itemList">
      <li>こだわりニット：1枚</li>
    </ul>
    <div class="total">1908円</div>
  -->
  お届け日は10/12(水)です。<br>注文を確定します。よろしいですか？
  </div>
  <div class="foot">
    <a class="button blue ghost cancel">戻る</a>
    <a class="button blue submit">注文する</a>
  </div>
</div>
@endsection
