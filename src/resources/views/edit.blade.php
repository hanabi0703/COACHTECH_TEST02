@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection

@section('title', 'mogitate')

@section('content')
<div class="edit-page">
    <form class="form" action="/revise" method="post">
    @csrf
    <div>
        <img src="{{ asset('storage/images/'. $product->image) }}" alt="">
    </div>
    <div>
        <span>商品名</span>
        <input type="text" name="name" value="{{ $product['name'] }}"/>
    </div>
    <div>
        <span>値段
        </span>
        <input type="text" name="price" value="{{ $product['price'] }}"/>
    </div>
    <div>
        <span>季節</span>
        <input type="checkbox" name="spring" value="{{ $product['name'] }}"/>
        <label for="spring">春</label>
        <input type="checkbox" name="summer" value="{{ $product['name'] }}"/>
        <label for="summer">夏</label>
        <input type="checkbox" name="autumn" value="{{ $product['name'] }}"/>
        <label for="autumn">秋</label>
        <input type="checkbox" name="winter" value="{{ $product['name'] }}"/>
        <label for="winter">冬</label>
    </div>
    <div>
        <span>商品説明</span>
        <textarea name="description">{{ $product['description'] }}</textarea>
    </div>
    <a class="" href="/">戻る</a>
	<p><input type="button" value="変更を保存" id="button2"></p>
    </form>

</div>
@endsection