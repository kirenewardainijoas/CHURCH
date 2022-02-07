@extends('layouts.plain')

@section('content')
{{-- <div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card rounded">

                <img src="{{asset('images/interiorkatedral.jpg')}}" alt="" class="w-100">


                    <div class="card-body">
                        <h4 class="card-title">Login {{env('APP_NAME')}}</h4>
                        <form method="POST" action="{{ route('login') }}">
                            @csrf

                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Remember Me') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item text-center">
                            @if (Route::has('password.request'))
                                <a class="btn btn-link" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                            @endif
                        </li>
                    </ul>
        </div>
    </div>
</div> --}}

<div class="row h-100 mt-4">
    <div class="col-md-8" >
        <img src="{{asset('images/interiorkatedral.jpg')}}" alt="" class="img-fluid w-100 h-100">
    </div>
    <div class="col-md-4 bg-light">
        <div class="row my-3">
            <div class="col w-100 d-flex justify-content-center">
                <img src="{{asset('images/Logo_GMIT_Baru.png')}}" alt="" class="img-fluid mx-auto" style="max-width: 10rem">
            </div>
        </div>
        <div class="row mr-3">
            <div class="col">
                <div class="card">
                    <div class="card-header text-center">
                        <h3>Masuk</h3>
                    </div>
                    <div class="card-body">
                        <div class="alert alert-success text-center">
                            Selamat datang! Silahkan masukkan akun Anda
                        </div>
                        <form action="{{route('login')}}" method="post">
                            @csrf
                            <div class="form-group row">
                                <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                                <div class="col-md-6">
                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                                <div class="col-md-6">
                                    <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">

                                    @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6 offset-md-4">
                                    <div class="form-check">
                                        <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                        <label class="form-check-label" for="remember">
                                            {{ __('Ingat saya') }}
                                        </label>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group row mb-0">
                                <div class="col-md-12">
                                    <button type="submit" class="btn btn-primary w-100">
                                        {{ __('Login') }}
                                    </button>


                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="card-footer text-center">
                        @if (Route::has('password.request'))
                                <a class="btn btn-link text-center" href="{{ route('password.request') }}">
                                    {{ __('Lupa password Anda?') }}
                                </a>
                        @endif
                    </div>
                    <div class="card-footer text-center">
                        @if (Route::has('register'))
                                <a class="btn btn-link text-center" href="{{ route('register') }}">
                                    {{ __('Belum punya akun? Daftar di sini!') }}
                                </a>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
