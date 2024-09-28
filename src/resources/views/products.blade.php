@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('title', 'mogitate')

@section('button')
<nav class="header-nav">
    <form class="form_logout" action="/logout" method="post">
        @csrf
        <button class="header-nav__button">logout</button>
    </form>
</nav>
@endsection

@section('content')
<div class="products-page">
    <div class="products__heading">
        <h2>商品一覧</h2>
    </div>
    <form class="add-form" action="/products/register" method="get">
    @csrf
            <button class="add-form__button-submit" type="submit">+商品を追加</button>
    </form>
    <form class="search-form" action="/products/search" method="get">
    @csrf
        <div class="products-form__item">
            <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
            <button class="search-form__button-submit" type="submit">検索</button>
    </form>
        <select class="search-form__item-gender" name="price">
        <option value="">価格で並べる</option>
        <option value="1">高い順に表示</option>
        <option value="2">低い順に表示</option>
        </select>
    <ul class="products-list">
        @foreach ($products as $product)
            <li>
                <div class="products-list-item">
                    <img src="{{ asset('storage/images/'. $product->image) }}" alt="">
                    <span class="">{{$product->name}}</span>
                    <span class="">{{$product->price}}</span>
                </div>
            </li>
            @endforeach
    </ul>
    <div class="pagination">
    </div>
</div>
@endsection