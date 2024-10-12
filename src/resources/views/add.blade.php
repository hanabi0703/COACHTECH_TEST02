@extends('layouts.default')

@section('css')
    <link rel="stylesheet" href="{{ asset('css/add.css') }}">
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
        <span class="form__required">商品名</span>
        <input type="text" name="name" placeholder="商品名を入力" value="{{ old('name') }}"/>
        <div class="form__error">
            @error('name')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div>
        <span class="form__required">値段</span>
        <input type="text" name="price" placeholder="値段を入力" value="{{ old('price') }}"/>
        <div class="form__error">
            @error('price')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div>
        <span class="form__required">商品画像</span>
        <figure id="figure" style="display:none">
            <img id="figureImage">
        </figure>
        <input id="input" type="file" name="image" value=""/>
        <div class="form__error">
            @error('image')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div class="edit-form__content">
        <span class="form__required">季節</span>
        <div class="content__seasons">
        @foreach ($seasons as $season)
        <label class="seasons__content">
            <input type="checkbox" name="season_ids[]" value="{{$season->id}}"/>
        {{$season->name}}</label>
        @endforeach
        </div>
        <div class="form__error">
            @error('season_ids')
                {{ $message }}
            @enderror
        </div>
    </div>
    <div>
        <span class="form__required">商品説明</span>
        <textarea name="description" class="textarea-content" placeholder="商品の説明を入力">{{ old('description') }}</textarea>
        <div class="form__error">
            @error('description')
                {{ $message }}
            @enderror
        </div>
    </div>
    <a class="form__button-back" href="/">戻る</a>
    <button class="form__button-submit" type="submit">変更を保存</button>
    </form>
</div>
@endsection