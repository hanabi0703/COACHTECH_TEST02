@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/products.css') }}">
@endsection

@section('title', 'mogitate')

@section('content')
<div class="products-page">
    <div class="products__heading">
        <h2>商品一覧</h2>
    </div>
    <!-- <a href="/products/register">+商品を追加</a> -->
    <div class="products__main">
        <div class="input-form">
                <form class="search-form" action="/products/search" method="get">
                @csrf
                    <div class="products-form__item">
                        <input class="search-form__item-input" type="text" name="keyword" value="{{ old('keyword') }}">
                        <button class="search-form__button-submit" type="submit">検索</button>
                    </div>
                </form>
                <select class="sort-form" name="price">
                    <option value="">価格で並べる</option>
                    <option value="1">高い順に表示</option>
                    <option value="2">低い順に表示</option>
                </select>
            </div>
            <div class="main-area">
                <form class="add-form" action="/products/register" method="get">
                @csrf
                        <button class="add-form__button-submit" type="submit">+商品を追加</button>
                </form>
                <ul class="products-list">
                    @foreach ($products as $product)
                        <li>
                            <a href="{{ route('products.edit', ['id'=>$product->id]) }}" class="product-list__link">
                            <div class="products-list__item">
                                    <img src="{{ asset('storage/images/'. $product->image) }}" alt="">
                                <div class="products-list_text">
                                    <span class="">{{$product->name}}</span>
                                    <span class="">¥{{$product->price}}</span>
                                </div>
                            </div>
                            </a>
                        </li>
                        @endforeach
                </ul>
            </div>
    </div>
    <div class="pagination">
    </div>
</div>
@endsection