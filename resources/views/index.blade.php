@extends('layouts.app')

@section('header')
<title>TOP PAGE</title>
<link rel="stylesheet" href="css/index.css">
<link rel="stylesheet" href="css/index_sp.css">
@endsection

@section('content')
<section class="mainImage section">
<div class="flexslider">
	<ul class="slides">
    	<li><a href="#"><img src="images/slider/1_1.jpg" alt="スライド名1"></a></li>
        <li><a href="#"><img src="images/slider/1_2.jpg" alt="スライド名2"></a></li>
        <li><a href="#"><img src="images/slider/1_3.jpg" alt="スライド名3"></a></li>
    </ul>
</div>
</section>
<section class="itemModule section">
  <h1>PICKUP RECOMMEND</h1>
    <div class="itemList">
      @foreach ($items as $item)
      <div class="item">
        <div class="image">
          <a href="/item/{{ $item->id }}">
            <img src="{{ $item->picture01 }}" alt="{{ $item->name }}">
            <span class="link">くわしくみる</span>
          </a>
        </div>
        <div class="name"><a href="detail_1.html">{{ $item->name }}</a></div>
        <div class="price">{{ number_format($item->price) }}円</div>
        <div class="favorite"><?php $class = (array_search($item->id, $fav_items)!==false ? ' select' : ''); ?><a href="/item/favorite/{{ $item->id }}" class="favorite_btn{{ $class }}"><i class="fa fa-heart"></i></a></div>
      </div>
    @endforeach
  </div>
</section>
<section class="itemModule border-top section">
  <h1>定番商品</h1>
  <div class="itemList">
    <div class="item">
      <div class="image">
        <a href="detail_4.html">
          <img src="images/item/4.jpg" alt="商品名4">
          <span class="link">くわしくみる</span>
        </a>
      </div>
      <div class="name"><a href="detail_4.html">ブラジル産　こだわりコーヒー</a></div>
      <div class="price">1,800円</div>
      <div class="favorite"><a href="#" class="favorite_btn"><i class="fa fa-heart"></i></a></div>
    </div>
    <div class="item">
      <div class="image">
        <a href="detail_5.html">
          <img src="images/item/5.jpg" alt="商品名5">
          <span class="link">くわしくみる</span>
        </a>
      </div>
      <div class="name"><a href="detail_5.html">ていねいなバスタオル</a></div>
      <div class="price">4,500円</div>
      <div class="favorite"><a href="#" class="favorite_btn"><i class="fa fa-heart"></i></a></div>
    </div>
    <div class="item">
      <div class="image">
        <a href="detail_6.html">
          <img src="images/item/6.jpg" alt="商品名6">
          <span class="link">くわしくみる</span>
        </a>
      </div>
      <div class="name"><a href="detail_6.html">木目が美しいボウル</a></div>
      <div class="price">2,980円</div>
      <div class="favorite"><a href="#" class="favorite_btn"><i class="fa fa-heart"></i></a></div>
    </div>
  </div>
</section>
<section class="newsModule">
  <div class="section">
    <h1>NEWS</h1>
    <div class="newsList" id="newsList">
      <div class="newsItem">
        <div class="image"><img src="images/news/1.jpg" alt="画像名"></div>
        <div class="title">1半期に一度のセール開催中！</div>
        <div class="text">販売終了になるアイテムなどが、お求め安い価格でゲットできます！残りわずかなアイテムを手軽にお求めいただける最後のチャンス。</div>
      </div>
      <div class="newsItem">
        <div class="image"><img src="images/news/2.jpg" alt="画像名"></div>
        <div class="title">テーブルウェアフェア開催中</div>
        <div class="text">世界各国からこだわりのテーブルウェアを集めました。最大20%OFFの限定商品も。この機会にしか出会えない希少なアイテムにも出会えます</div>
      </div>
    </div>
  </div>

</section>
@endsection

@section('footer')
<script type="text/javascript" src="js/top.js"></script>
<script src="js/jquery.flexslider.js"></script>
@endsection
