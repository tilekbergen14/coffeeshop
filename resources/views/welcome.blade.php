@extends("layouts.app")

@section('content')
    <!-- Page Content -->
    <!-- Banner Starts Here -->
    <div class="banner header-text">
        <img src="images/static/1.jpg" alt="" style="aspect-ratio: 16 / 9; width: 100%; object-fit: cover">
    </div>
    <!-- Banner Ends Here -->

    <div class="latest-products">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>Соңғы тауарлар</h2>
                        <a href="{{ route('store') }}">барлығын көру <i class="fa fa-angle-right"></i></a>
                    </div>
                </div>
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
                                            <button class="btn btn-primary">
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

    <div class="best-features">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="section-heading">
                        <h2>CoffeeShop!</h2>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="left-content">
                        <h4>Астанада бірінші орында!</h4>
                        <p>
                            Астанадығы ең дәмді кофелер. Lorem ipsum, dolor sit amet consectetur adipisicing elit. Aut
                            dolore tenetur atque eum hic porro cupiditate natus optio architecto nobis!
                        </p>
                        <ul class="featured-list">
                            <li>Қазақстан қалаларына жеткізу қызметі</li>
                        </ul>
                        <a href="about.html" class="filled-button">Толығырақ</a>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="right-image">
                        <img src="assets/images/feature-image.jpg" alt="" />
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
