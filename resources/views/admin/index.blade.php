@extends('layouts.admin')
@section('content')
    <div class="container my-4">
        <div class="d-flex justify-content-between mb-3" style="height: 35px">
            <div class="input-group" style="width: auto">
                {{-- <div class="input-group-prepend">
                    <label class="input-group-text" for="inputGroupSelect01">Status</label>
                </div> --}}
            </div>
            <form action="{{ route('createproduct') }}">
                <button class="btn btn-primary">Жаңа тауар қосу</button>
            </form>
        </div>
        <div style="max-width: 100%; overflow-x: auto">
            <table class="table rounded" style="overflow-x: auto">
                <thead>
                    <tr>
                        <th scope="col">Сурет</th>
                        <th scope="col">Аты</th>
                        <th scope="col">Бағасы</th>
                        <th scope="col" style="text-align: end">Өзгерту</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($products as $product)
                        <tr>
                            <td scope="row" style="width: 150px">
                                <div class="list-img rounded">
                                    <img class="list-img rounded"
                                        style="height: 64px; aspect-ratio: 16 / 9; object-fit: cover"
                                        src="{{ $product->image }}" alt="No Image">
                                </div>
                            </td>
                            <td scope="row" style="width: 100%" class="text-ellipsis">{{ $product->name }}
                            </td>
                            <td scope="row" style="width: 150px">{{ $product->price }} &#8376;</td>
                            <td scope="row" style="width: max-content">
                                <div class="d-flex">
                                    <form action="{{ route('delete', $product) }}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <input name="id" type="hidden" value="{{ $product->id }}">
                                        <button type=" submit" class="btn btn-danger">Delete</button>
                                    </form>
                                    <form action="{{ route('createproduct') }}" method="get">
                                        <input name="id" type="hidden" value="{{ $product->id }}">
                                        <button type="submit" class="btn btn-warning ml-2">Edit</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <div class="d-flex justify-content-center">
            {{ $products->links() }}
        </div>
    </div>
@endsection
