@extends('layouts.app')

@section('header')
<title>{{ $item->name }} - DMS online</title>
<link rel="stylesheet" href="/css/detail.css">
<link rel="stylesheet" href="/css/detail_sp.css">
@endsection

@section('content')
<nav class="breadCrumb">
  <ul class="section">
    <li><a href="#">TOP</a></li>
    <li><span>商品詳細</span></li>
  </ul>
</nav>




<div class="twoCol section">
<div class="twoColLeft">
  <!-- Mod: 画像切り替えモジュール -->
  <section class="itemImageModule">
    <div class="imageShow" id="imageShow">
      <div class="image">
        <img src="{{ $item->picture01 }}" alt="">
      </div>
      <div class="favorite">
        <?php $class = ($fav_item == 1 ? ' select' : ''); ?>
        <a href="/item/favorite/{{ $item->id }}" class="favorite_btn{{ $class }}"><i class="fa fa-heart"></i></a>
      </div>
    </div>
    <div class="imageSelect" id="imageSelect">
      <ul>
        <li><img src="{{ $item->picture01 }}" alt=""></li>
        <li><img src="{{ $item->picture02 }}" alt=""></li>
        <li><img src="{{ $item->picture03 }}" alt=""></li>
      </ul>
    </div>
  </section>
</div>
<div class="twoColRight">


  <!-- Mod: 説明モジュール -->
  <section class="itemInfoModule">
    <h1 class="name">{{ $item->name }}</h1>
    <div class="price">税込<span>{{ number_format($item->price) }}</span>円</div>
    <ul class="tabNav" id="tabNav">
        <li class="select"><a href="#container_1">詳細文</a></li>
        <li><a href="#container_2">オススメの声</a></li>
    </ul>
    <div class="tabContainer" id="tabContainer">
      <div class="description textBlock container container_1 show">
        <p>{!! nl2br($item->description) !!}</p>
      </div>
      <div class="recommend textBlock container container_2">
        <p>{!! nl2br($item->recommend) !!}</p>
      </div>
    </div>
  </section>


  <!-- Mod: フォームモジュール -->
  <section class="formModule">
    <form action="" class="form" method="post">
      {{ csrf_field() }}
      <div class="unitSelect">
        <span>数量</span>
        <label>
          <select name="unit" id="">
            <option value="1">1</option>
            <option value="2">2</option>
            <option value="3">3</option>
            <option value="4">4</option>
            <option value="5">5</option>
          </select>
        </label>
      </div>
      <div class="buttons">
        <button type="submit" class="button black" id="addCartButton">カートに入れる</button>
      </div>
    </form>
  </section>


  <!-- Mod: 注意事項モジュール -->
  <section class="noticeModule textBlock">
    <p>配送料：700円</p>
    <p class="red">総額10,000円（税込）から<strong>送料無料</strong></p>
    <p class="red">ネットストア限定：5,000円以上お買い上げでポイント2倍</p>
  </section>


</div>


</div>
@endsection
