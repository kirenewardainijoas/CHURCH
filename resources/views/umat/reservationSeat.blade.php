@extends('umat.layouts.main')
@section('header')
    Pilih kursi untuk {{$schedule->title}} pada tanggal {{$schedule->jadwal}}
@endsection
@section('card-body')
        <div class="alert alert-primary">
            Jika jika tidak ada kursi yang dapat dipesan, silahkan melakukan ibadah online melalui link berikut
            <a href="{{$schedule->meeting_link}}" class="btn btn-danger">Online Streaming</a>
        </div>
        <div class="alert alert-warning">
            Silahkan pilih kursi yang ingin Anda pesan
        </div>
        <div class="d-flex flex-row flex-wrap">
            @foreach ($seats as $seat)
            <div class="col-md-3 my-2">
            <form action="/umat/reservation/book" method="post">
                @csrf
                <input type="hidden" name="scheduleId" value="{{$schedule->id}}">
                    <input type="hidden" name="seat" value="{{$seat['seat_id']}}">
                    @if($seat['status'] == false)
                        <button type="submit" class="btn btn-secondary disabled" disabled>{{$seat['seat_name']}}</button>
                    @else
                        <button type="submit" class="btn btn-success">{{$seat['seat_name']}}</button>
                    @endif
                </form>
            </div>
                @endforeach
            </div>

@endsection
