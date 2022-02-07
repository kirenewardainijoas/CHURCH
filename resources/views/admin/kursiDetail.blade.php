@extends('admin.layouts.main')
@section('header')
<a href="/admin/schedule" class="btn btn-secondary">Back</a>
    Seat Detail for {{$schedule->title}} on {{$schedule->jadwal}}
@endsection
@section('card-body')
    <div class="d-flex flex-row flex-wrap ">
        @foreach ($seats as $seat)
            <div class="col-md-3 d-flex my-1">
                <button class="btn @if($seat['status']=='available') btn-success @else btn-danger @endif">
                    {{$seat['seat']}}
                </button>
            </div>
        @endforeach
    </div>
@endsection
