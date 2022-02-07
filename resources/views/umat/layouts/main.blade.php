@extends('layouts.app')
@section('sidebar')
<div class="row h-100 bg-warning">
    <div class="col px-5">
        <div class="row my-3 ">
            <div class="col mx-auto d-flex justify-content-center">
                <img src="{{asset('images/Logo_GMIT_Baru.png')}}" alt="" class="img-fluid mx-auto" style="max-height:10rem">
            </div>
        </div>
        <div class="row ">
            <h5>
                Hello, {{Auth::user()->name}}
            </h5>
        </div>
        <div class="row">
            <span class="badge badge-success">
                Umat
            </span>
        </div>
        <div class="row my-3 bg-dark p-2 d-flex align-items-center justify-content-between text-light">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-speedometer " viewBox="0 0 16 16">
                <path d="M8 2a.5.5 0 0 1 .5.5V4a.5.5 0 0 1-1 0V2.5A.5.5 0 0 1 8 2zM3.732 3.732a.5.5 0 0 1 .707 0l.915.914a.5.5 0 1 1-.708.708l-.914-.915a.5.5 0 0 1 0-.707zM2 8a.5.5 0 0 1 .5-.5h1.586a.5.5 0 0 1 0 1H2.5A.5.5 0 0 1 2 8zm9.5 0a.5.5 0 0 1 .5-.5h1.5a.5.5 0 0 1 0 1H12a.5.5 0 0 1-.5-.5zm.754-4.246a.389.389 0 0 0-.527-.02L7.547 7.31A.91.91 0 1 0 8.85 8.569l3.434-4.297a.389.389 0 0 0-.029-.518z"/>
                <path fill-rule="evenodd" d="M6.664 15.889A8 8 0 1 1 9.336.11a8 8 0 0 1-2.672 15.78zm-4.665-4.283A11.945 11.945 0 0 1 8 10c2.186 0 4.236.585 6.001 1.606a7 7 0 1 0-12.002 0z"/>
            </svg>
            <a href="{{route('umat')}}" class="text-decoration-none text-light">
            Dashboard
            </a>
        </div>
        <div class="row my-3 bg-dark p-2 d-flex align-items-center justify-content-between text-light">

            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar-check-fill" viewBox="0 0 16 16">
                <path d="M4 .5a.5.5 0 0 0-1 0V1H2a2 2 0 0 0-2 2v1h16V3a2 2 0 0 0-2-2h-1V.5a.5.5 0 0 0-1 0V1H4V.5zM16 14V5H0v9a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2zm-5.146-5.146-3 3a.5.5 0 0 1-.708 0l-1.5-1.5a.5.5 0 0 1 .708-.708L7.5 10.793l2.646-2.647a.5.5 0 0 1 .708.708z"/>
            </svg>
            <a href="/umat/reservation" class="text-decoration-none text-light">
                Reservation
            </a>
        </div>
    </div>
</div>

@endsection
@section('content')

            <div class="card rounded shadow p-1">

                        <div class="card bg-light">
                            <div class="card-header">
                                @yield('header')
                            </div>
                            <div class="card-body">
                                @yield('card-body')
                            </div>
                        </div>

            </div>

@endsection
