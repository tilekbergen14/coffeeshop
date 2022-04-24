@extends("layouts.app")

@section('content')
    <div class="container" style="padding-top: 100px">
        <div style="max-width: 100%; overflow-x: auto;  min-height: 60vh">
            <table class="table rounded" style="overflow-x: auto;">
                <thead>
                    <tr>
                        <th scope="col">Сурет</th>
                        <th scope="col">Аты</th>
                        <th scope="col">Бағасы</th>
                        <th scope="col" style="text-align: end">Өзгерту</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach (auth()->user()->favourites as $favourite)
                        <tr>
                            <td scope="row" style="width: 150px">
                                <div class="list-img rounded">
                                    <img class="list-img rounded"
                                        style="height: 64px; aspect-ratio: 16 / 9; object-fit: cover"
                                        src="{{ $favourite->product->image }}" alt="No Image">
                                </div>
                            </td>
                            <td scope="row" style="width: 100%" class="text-ellipsis">{{ $favourite->product->name }}
                            </td>
                            <td scope="row" style="width: 150px">{{ $favourite->product->price }} &#8376;</td>
                            <td scope="row" style="width: max-content">
                                <div class="d-flex">
                                    <form action="{{ route('addtocard', $favourite->product) }}" method="POST">
                                        @csrf
                                        <input name="id" type="hidden" value="{{ $favourite->id }}">
                                        <button type=" submit" class="btn btn-danger">Алып тастау</button>
                                    </form>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        <form action="{{ route('logout') }}">
            <button class="btn btn-danger w-100">Шығу</button>
        </form>
        {{-- <div class="d-flex justify-content-center">
        {{ $products->links() }}
    </div> --}}
    </div>
@endsection
