@extends("layouts.app")

@section('content')
    <!-- Page Content -->
    <div class="page-heading products-heading header-text">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="text-content">
                        <h2 class="text-info">Restaurant Astana!</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="filters">
                        <ul>
                            <li class="active" data-filter="*">Барлығы</li>
                            {{-- <li data-filter=".dev">Жеңілдіктер</li>
                            <li data-filter=".gra">Соңғылар</li> --}}
                        </ul>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="filters-content">
                        <div class="row">
                            @foreach ($products as $product)
                                <div class="col-md-4">
                                    <div class="product-item">
                                        <a href="#"><img src={{ $product->image }} alt="" /></a>
                                        <div class="down-content">
                                            <a href="#">
                                                <h4>{{ $product->name }}</h4>
                                            </a>
                                            <h6>{{ $product->price }} &#8366</h6>
                                            <div class="d-flex justify-content-between">
                                                <ul class="stars d-flex align-items-center">
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                    <li><i class="fa fa-star"></i></li>
                                                </ul>
                                                @if (auth()->user() && $product->favourited(auth()->user()->id, $product->id))
                                                    <form action="{{ route('addtocard', $product) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-warning">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </button>
                                                    </form>
                                                @else
                                                    <form action="{{ route('addtocard', $product) }}" method="POST">
                                                        @csrf
                                                        <button class="btn btn-info">
                                                            <i class="fa fa-cart-plus"></i>
                                                        </button>
                                                    </form>
                                                @endif
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="d-flex w-100 justify-content-center">
                    {{ $products->links() }}
                </div>
            </div>
        </div>
    </div>
@endsection
