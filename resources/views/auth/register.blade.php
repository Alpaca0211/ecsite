@extends('layouts.app')

@section('header')
<title>会員登録ページ</title>
@endsection

@section('content')
<div class="content">
 <div class="heading section">
    <h1 class="center">CREATE ACOUNT<span>アカウント登録</span></h1>
  </div>

  <form method="POST" action="{{ route('register') }}" class="form" novalidate>
    {{ csrf_field() }}
    <ul>
      <li class="short"><label for="name">お名前：</label>
          <input type="text" name="name" width="1000" value="{{ old('name') }}"placeholder="例）----" required>
          @if ($errors->has('name'))
          <p class="error">{{ $errors->first('name') }}
          @endif
</li>
      <li><label for="email">E-Mail:</label>
          <input type="email" id="email" name="email" size="40" value="{{old('email')}}" placeholder="例）aaa@fkakfsl.com" autofocus required>
          @if ($errors->has('email'))
          <p class="error">{{ $errors->first('email') }}
          @endif

      </li>
      <li><label for="password">パスワード：</label>
          <input id="password" type="password" name="password" width="1000" placeholder="例）----" required>
          @if ($errors->has('password'))
                    <p class="error">{{ $errors->first('password') }}</p>
                    @endif
</li>
      <li><label for="password-confirm">パスワード（確認）：</label>
          <input id="password-confirm" type="password" name="password_confirmation" width="1000" placeholder="例）----" required></li>
      <li><label for="tel">電話番号:</label>
          <input type="tel" id="tel" name="tel" size="24" value="{{old('tel')}}" placeholder="例）xxx-xxxx-xxxx" required>
          @if ($errors->has('tel'))
                    <p class="error">{{ $errors->first('tel') }}</p>
                    @endif
      </li>
    </ul>

  <!-- Mod: ボタンモジュール -->
  <section class="buttonModule section">
    <button type="submit" class="button blue">上記の内容で登録する</button>
  </section>
  </form>

</div>
@endsection
