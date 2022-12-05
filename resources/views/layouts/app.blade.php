<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width">
  <link rel="stylesheet" href="/css/flexslider.css" type="text/css">
  <link rel="stylesheet" href="/css/reset.css">
  <link rel="stylesheet" href="/css/common.css">
  <link rel="stylesheet" href="/css/common_sp.css">
  <link rel="stylesheet" href="/font-awesome/css/font-awesome.min.css">
 @yield('header')
</head>
<body>
<section class="globalHeader">
  <div class="section">
    <div class="logo"><a href="index.html">DMS online</a></div>
    <nav class="globalNav">
      <ul class="sp_menu" id="sp_menu">
        <li class="favorite_icon"><a href="#"></a></li>
        <li class="cart_icon"><a href="cart.html"></a></li>
        <li class="sp_menu_icon"><a href="#"></a></li>
      </ul>
      <ul class="common_menu">
        <li class="select"><a href="index.html">HOME</a></li>
        <li><a href="detail_1.html">SHOP</a></li>
        <li><a href="#">NEWS</a></li>
        <li><a href="#">GUIDE</a></li>
        <li><a href="#">ABOUT</a></li>
        <li><a href="#">MY PAGE</a></li>
        <li class="cart" id="cart"><a href="cart.html"><i class="fa fa-shopping-cart"></i><span id="cart_num">0</span></a></li>
        <li>
          @if (Auth::check())
          <form action="/logout" method="post">
            {{ csrf_field() }}
            <button type="submit">LOGOUT</button>
          </form>
         @else
          <form action="/login" method="get">
            <button type="submit">LOGIN</button>
          </form>
        @endif
      </ul>
    </nav>
  </div>
</section>

@yield('content')

<section class="globalFooter">
  <div class="copyright">copyright 2017 DMS ONLINE</div>
</section>

<script type="text/javascript" src="/js/jquery-3.1.1.min.js"></script>
<script type="text/javascript" src="/js/main.js"></script>
@yield('footer')
</body>
</html>
