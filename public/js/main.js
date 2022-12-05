$(document).ready(function(){



/* =================
  ヘッダー追従
 ================= */

  // ページのスクロール高さを取得
  $(window).on('scroll', function(){

    // スクロールが一定高さ（50px）を超えたら関数を呼び出す
    if($(this).scrollTop() > 50){
      $('.globalHeader').addClass('fixed');
    } else {
      $('.globalHeader').removeClass('fixed');
    }
  })



/* =================
   テキスト色変更
 ================= */

// CSSのみで対応



/* =================
   画像反転／ボタン表示
 ================= */

// CSSのみで対応



/* =================
   お気に入りボタン
 ================= */

  // お気に入りボタンを押したら...
  $('.favorite_btn').on('click', function(e){
    // デフォルトのアンカー移動を抑制
    e.preventDefault();

    // Class名「select」を付与する
    $(this).toggleClass('select');

    // 色と動きはCSS側のアニメーションで記述しています
    // AnimationName: bound

  })



/* =================
   タブ切り替え
 ================= */

  $('#tabNav li a').on('click',function(e){
    e.preventDefault();


    // 表示する対象の名前を取得
    var containerName = $(this).attr('href').replace('#','');

    // 他のすべての中身を非表示にする
    $('#tabContainer .container').removeClass('show');

    // 対象だけを表示する
    $('#tabContainer .' + containerName).addClass('show');

    // 兄弟要素からClass名を削除
    $(this).parent().siblings().removeClass('select');

    // 自分にClass名を付与
    $(this).parent().addClass('select');


  })



/* =================
  サイズ選択
 ================= */

  // サイズ選択ボタンにクリックイベントを付与
  $('.sizeSelect ul li a').on('click', function(e){
    // デフォルトのアンカー移動を抑制
    e.preventDefault();

    var btn = $(this).parent();

    // 兄弟要素からClass名を削除
    btn.siblings().removeClass('select');

    // 自分にClass名を付与
    btn.addClass('select');

    // もし在庫がないものを選んだら、アラートを表示する
    if(btn.hasClass('empty')){
      $('.sizeSelect').next().removeClass('hidden');
    } else {
      $('.sizeSelect').next().addClass('hidden');
    }
  })



/* =================
   カートに入れるボタン
 ================= */

  // カートに入れるボタンを押したら...
  $('#addCartButton').on('click', function(e){

    // まだ押してない場合のみ処理を実行

    if($(this).attr('href') === '#'){

      e.preventDefault();

      // ボタン自体の処理
      $(this)
      .addClass('ghost') // 見た目を変える
      .text('カートの中身を見る') // テキストを変える
      .attr('href', 'cart.html'); // カートへのリンクに変える

      // カートのアイコン周りの処理
      countUpCartNum();
    }

  })

  // カートの数字をカウントアップする
  var countUpCartNum = function(){
    var num_text = $('#cart a span').text();
    var num = parseInt(num_text);

    // もしカートが0だった場合、1増えた際の装飾を加える
      $('#cart').addClass('select');

    // 数字に1を加えて、表示する
    $('#cart_num').text(num+1);

  }



/* =================
   画像反転／ボタン表示
 ================= */

// 以前の課題にて実装済



/* =================
  サムネイル選択で画像変更
 ================= */

  // サムネイルにマウスーバーしたら...
  $('#imageSelect ul li img').on('mouseover', function(){

    // 画像パスを取得
    var imagePath = $(this).attr('src');

    // 大きい画像のパスを変更する
    $('#imageShow .image img').attr('src', imagePath);
  })




/* =================
   合計金額が変わる
 ================= */

  // ＜先に汎用的な関数を作っておく＞
  // ** カートの現在の金額を計算し、表示する関数 **

  var totalPrice = 0;
  var culTotalPrice = function(){
    totalPrice = 0;
    $('#cartTable tr:not(.head):not(.error)').each(function(){
      var price = $(this).children('.price').children('span').text();
      var unit = $(this).children('.unit').children('label').children('select').val();
      var subtotal = price * unit;
      totalPrice = totalPrice + subtotal;
    })
    $('#totalPrice').text(totalPrice);
  }


  // セレクトボックスを変えると金額を計算し直す
  $('select[name=unit]').on('change', function(){
    culTotalPrice();
  })



/* =================
   削除するボタン
 ================= */

  $('.cartTableModule .removeButton').on('click', function(e){
    // e.preventDefault();

    // 行を消す
    // $(this).parent().parent().remove();

    // 金額を計算し直す
    culTotalPrice();

    // カートの中身を調べる
    checkCart();
  })



/* =================
   カートの中身がない時、ボタンをグレーアウト
 ================= */

  // カートをチェックする関数
  var checkCart = function(){

    // 商品の行があるかをチェック（テーブル見出しと在庫切れ以外）
    var itemCount = $("#cartTable tr:not(.head):not(.error)").length;

    // もし商品がなければ、ボタンをグレーアウト
    if(itemCount > 0){
      $('#submitButton').removeClass('disabled');
    } else {
      $('#submitButton').addClass('disabled');
    }
  }



/* =================
   確定時、モーダルを表示する
 ================= */

 $('#submitButton').on('click', function(e){
	 e.preventDefault();

	 showModal();

	 $('#modal .foot .cancel').on('click', function(){
		hideModal();
	 });
 })

 var showModal = function(){
	$('#modal').fadeIn();
	$('#cover').fadeIn();
 }

 var hideModal = function(){
	$('#modal').fadeOut();
	$('#cover').fadeOut();
 }



/* =================
   サイズがない時アラートを表示
 ================= */

$('select[name=size]').on('change', function(){
  var size = $(this).val();
  var tr = $(this).parent().parent().parent();

  if(size.match(/在庫切れ/)){
    tr.addClass('error');
  } else {
    tr.removeClass('error');
  }
  culTotalPrice();
  checkCart();

})



/* =================
  ハンバーガーメニュー
 ================= */

$('#sp_menu .sp_menu_icon').on('click', function(){
	$('.common_menu').slideToggle();
})

$('select[name=unit]').on('change', function(){
  $(this).parents('form').submit();
});
});
