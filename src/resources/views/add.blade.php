@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/edit.css') }}">
@endsection
@section('js')
    <script src="{{ asset('/js/preview.js') }}"></script>
@endsection

@section('title', 'mogitate')

@section('content')
<div class="add-page">
    <h2>商品登録</h2>
    <form class="form" action="/products/register" method="post" enctype="multipart/form-data">
    @csrf
    <div>
        <span>商品名</span>
        <input type="text" name="name" value="商品名を入力"/>
    </div>
    <div>
        <span>値段</span>
        <input type="text" name="price" value="値段を入力"/>
    </div>
    <div>
        <span>商品画像</span>
        <figure id="figure" style="display:none">
            <img id="figureImage">
        </figure>
        <input id="input" type="file" name="image" value="ファイルを選択"/>
    </div>
    <div>
        <span>季節</span>
        @foreach ($seasons as $season)
        <label>
            <input type="checkbox" name="season_ids[]" value="{{$season->id}}"/>
        {{$season->name}}</label>
        @endforeach
    </div>
    <div>
        <span>商品説明</span>
        <textarea name="description">商品の説明を入力</textarea>
    </div>
    <a class="" href="/">戻る</a>
    <button class="form__button-submit" type="submit">変更を保存</button>
    </form>
</div>
@endsection