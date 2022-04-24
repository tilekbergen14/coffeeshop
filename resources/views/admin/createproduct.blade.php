@extends('layouts.admin')
@section('content')
    <div class="container-fluid my-4">
        <form method="post" enctype="multipart/form-data" action="{{ route('createproduct') }}">
            @csrf
            <input type="hidden" name="id" value="{{ $product ? $product->id : null }}">
            @error('name')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" id="addon-wrapping" style="width: 120px">Аты</span>
                <input value="{{ $product ? $product->name : old('name') }}" name='name' type="text" class="form-control"
                    placeholder="Аты" aria-label="Name" aria-describedby="addon-wrapping">
            </div>
            @error('description')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" style="width: 120px" id="addon-wrapping">Толығарық</span>
                <input value="{{ $product ? $product->description : old('description') }}" name='description' type="text"
                    class="form-control" placeholder="Толығарық" aria-label="description"
                    aria-describedby="addon-wrapping">
            </div>
            @error('price')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group my-3 flex-nowrap">
                <span class="input-group-text" style="width: 120px" id="addon-wrapping">Бағасы</span>
                <input value="{{ $product ? $product->price : old('price') }}" name='price' type="text"
                    class="form-control" placeholder="Бағасы" aria-label="Price" aria-describedby="addon-wrapping">
            </div>
            @error('image')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="input-group mb-3">
                @if ($product && $product->image)
                    <input type="hidden" value="{{ $product->image }}" name="existedImage">
                    <img src="{{ $product->image }}" class="uploaded-img mb-4">
                @endif
                <label style="width: 120px" class="input-group-text"
                    for="inputGroupFile02">{{ $product && $product->image ? 'Жаңа сурет' : 'Сурет' }}</label>
                <input value="{{ old('image') }}" name='image' type="file" class="form-control" id="inputGroupFile02">
            </div>

            <button type="submit"
                class="btn btn-primary w-100">{{ $product ? 'Өзгерісті сақтау' : 'Жаңадан қосу' }}</button>
        </form>
    </div>
@endsection
