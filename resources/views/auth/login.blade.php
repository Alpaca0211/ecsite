@extends('layouts.app')

@section('header')
<title>ログイン</title>
@endsection

@section('content')
<div class="content">
 <div class="heading section">
    <h1 class="center">LOGIN<span>ログイン</span></h1>
  </div>

  <form method="POST" action="{{ route('login') }}" class="form">
    @csrf
    <ul>
      <li><label for="email">E-Mail:</label>
          <input type="email" id="email" name="email" size="40" value="{{ old('email') }}" placeholder="例）aaa@fkakfsl.com" autofocus required>
          @if ($errors->has('email'))
          <p class="error">{{ $errors->first('email') }}</p>
          @endif
      </li>
      <li><label for="password">パスワード：</label>
          <input type="password" name="password" width="1000" placeholder="例）----" required>
          @if ($errors->has('password'))
          <p class="error">{{ $errors->first('password') }}</p>
          @endif
      </li>
    </ul>


  <!-- Mod: ボタンモジュール -->
  <section class="buttonModule section">
    <button type="submit" class="button blue">ログイン</button>
  </section>
  </form>

</div>
@endsection
