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
    <div class="edit__heading">
        <h2>商品登録</h2>
    </div>
    <form class="edit-form" action="/products/{id}/update" method="post" enctype="multipart/form-data">
        @csrf
    <div class="edit-contents__upper">
        <input type="hidden" name="id" value="{{ $product['id'] }}"/>
        <div class="edit__figure">
            <figure id="existFigure" class="edit__figure-exist">
                <img src="{{ asset('storage/images/'. $product->image) }}" alt="">
            </figure>
            <figure id="figure" style="display:none">
                <img id="figureImage">
            </figure>
            <input id="input" type="file" name="image" value="{{ $product['image'] }}"/>
            <div class="form__error">
                @error('image')
                    {{ $message }}
                @enderror
            </div>
        </div>
        <div class="edit-form__contents">
            <div class="edit-form__content">
                <span>商品名</span>
                <input type="text" name="name" value="{{ $product['name'] }}"/>
                <div class="form__error">
                    @error('name')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="edit-form__content">
                <span>値段</span>
                <input type="text" name="price" value="{{ $product['price'] }}"/>
                <div class="form__error">
                    @error('price')
                        {{ $message }}
                    @enderror
                </div>
            </div>
            <div class="edit-form__content">
                <span>季節</span>
                <div class="content__seasons">
                    @foreach ($seasons as $season)
                    <label class="seasons__content">
                        <input type="checkbox" name="season_ids[]" value="{{$season->id}}" {{ $product->seasons->contains($season->id)? 'checked' : '' }}/>
                    {{$season->name}}
                    </label>
                    @endforeach
                </div>
                <div class="form__error">
                    @error('season_ids')
                        {{ $message }}
                    @enderror
                </div>
            </div>
        </div>
    </div>
    <div class="edit-contents__lower">
        <span>商品説明</span>
        <textarea name="description" class="textarea-content">{{ $product['description'] }}</textarea>
        <div class="form__error">
            @error('description')
                {{ $message }}
            @enderror
        </div>
    </div>
        <div class="form__button">
            <a class="form__button-back" href="/">戻る</a>
            <button class="form__button-submit" type="submit">変更を保存</button>
        </div>
    </form>
    <form class="form" action="{{ route('products.delete', ['id'=>$product->id]) }}" method="post">
        @csrf
        <button class="form__button-dustbox" type="submit">
            <img src="{{ asset('storage/images/dustbox.png') }}" alt=""/>
        </button>
    </form>
</div>
@endsection