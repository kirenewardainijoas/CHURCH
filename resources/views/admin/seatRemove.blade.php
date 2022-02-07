@extends('admin.layouts.main')
@section('header')
    Remove Seat Confirmation
@endsection
@section('card-body')
    <div class="row">
        <div class="col text-center">
            <h5>Do you really want to remove seat</h5>
            <h3>{{$seat->seat}}</h3>
            <form action="/admin/seat/remove/" method="get">
                @csrf
                <input type="hidden" name="seatId" value="{{$seat->id}}">
                <div class="row pt-3">
                    <div class="col mx-auto">
                        <a href="/admin/seat" class="btn btn-primary">Go Back</a>
                        <button type="submit" class="btn btn-secondary">Confirm</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
