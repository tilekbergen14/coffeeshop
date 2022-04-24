@extends("layouts.app")

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-center" style="padding-top: 210px">
        <div class="bg-light container rounded p-2" style="max-width: 500px">
            <form action="{{ route('register') }}" method='POST' class="text-center">
                @csrf
                <div class="mb-2">
                    <a class="navbar-brand" href="/">CoffeeShop</a>
                </div>
                @error('name')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="text" class="form-control @error('name') border border-danger @enderror mb-2"
                        placeholder="Аты" name="name" value={{ old('name') }}>
                </div>
                @error('email')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="text" class="form-control @error('email') border border-danger @enderror mb-2"
                        placeholder="Почта" name="email" value={{ old('email') }}>
                </div>
                @error('password')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') border border-danger @enderror mb-2"
                        placeholder="Құпиясөз" name="password" value={{ old('password') }}>
                </div>
                @error('password')
                    <p class="text-start text-danger w-100 m-0" style="font-size: 14px">{{ $message }}</p>
                @enderror
                <div class="form-floating">
                    <input type="password" class="form-control @error('password') border border-danger @enderror mb-2"
                        placeholder="Құпиясөзді қайталау" name="password_confirmation"
                        value={{ old('password_confirmation') }}>
                </div>
                <div class="checkbox mb-3">
                    <label>
                        <input name='remember' type="checkbox" value="remember-me"> Remember me
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
                <div class="my-2">Тіркеліп қойдың ба? <a href="{{ route('login') }}">Кіру</a></div>
            </form>
        </div>
    </div>
@endsection
