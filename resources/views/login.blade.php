@extends("layouts.app")

@section('content')
    <div class="vh-100 d-flex justify-content-center align-items-cente" style="padding-top: 210px">
        <div class="bg-light container rounded p-2" style="max-width: 500px">
            <form action="{{ route('login') }}" method='POST' class="text-center">
                @csrf
                <div class="mb-2">
                    <a class="navbar-brand" href="/">Restaurant Astana</a>
                </div>
                @if (session('status'))
                    <div class="alert alert-danger">
                        {{ session('status') }}
                    </div>
                @endif
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
                <div class="checkbox mb-3">
                    <label>
                        <input type="checkbox" value="on" name='remember'> Есте сақтау
                    </label>
                </div>
                <button class="w-100 btn btn-lg btn-info" type="submit">Кіру</button>
            </form>
        </div>
    </div>
@endsection
