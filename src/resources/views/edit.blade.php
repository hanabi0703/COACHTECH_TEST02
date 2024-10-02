@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/preview.js') }}"></script>
@endsection


@section('title', 'mogitate')

@section('content')
<div class="edit-page">

    <form class="form" action="/products/{id}/update" method="post" enctype="multipart/form-data">
    @csrf
    <input type="hidden" name="id" value="{{ $product['id'] }}"/>
    <div>
        <figure id="existFigure">
            <img src="{{ asset('storage/images/'. $product->image) }}" alt="">
        </figure>
        <figure id="figure" style="display:none">
            <img id="figureImage">
        </figure>
        <input type="file" name="image" value="ファイルを選択"/>
    </div>
    <div>
        <span>商品名</span>
        <input type="text" name="name" value="{{ $product['name'] }}"/>
    </div>
    <div>
        <span>値段</span>
        <input type="text" name="price" value="{{ $product['price'] }}"/>
    </div>
    <div>
        <span>季節</span>
        @foreach ($seasons as $season)
        <label>
            <input type="checkbox" name="season_ids[]" value="{{$season->id}}" {{ $product->seasons->contains($season->id)? 'checked' : '' }}/>
        {{$season->name}}</label>
        @endforeach
    </div>
    <div>
        <span>商品説明</span>
        <textarea name="description">{{ $product['description'] }}</textarea>
    </div>
    <a class="" href="/">戻る</a>
    <button class="form__button-submit" type="submit">変更を保存</button>
    </form>
    <form class="form" action="{{ route('products.delete', ['id'=>$product->id]) }}" method="post">
        @csrf
        <button class="" type="submit">
            <img src="{{ asset('storage/images/dustbox.png') }}" alt=""/>
        </button>
    </form>
</div>
@endsection