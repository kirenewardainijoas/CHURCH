@extends('admin.layouts.main')
@section('header')
    Seat Configuration
@endsection

@section('card-body')
    @if(session()->has('message'))
        <div class="alert alert-success" role="alert">
            {{session()->get('message')}}
        </div>
    @endif
    @if($errors->any)
        @foreach ($errors->all() as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>
        @endforeach
    @endif
    <div class="row">
        <div class="col-md-9">
            <div class="card">
                <div class="card-body">
                    @if ($totalCount<1)
                        <h5 class="text-center my-auto">No Seat Available</h5>
                    @else
                    <div class="alert alert-warning">
                        Click seat to remove seat
                    </div>
                        <div class="d-flex flex-row flex-wrap ">
                            @foreach ($seats as $seat)
                                <div class="col-md-3 d-flex my-1">
                                    <a href="/admin/seat/remove/confirm/{{$seat->id}}" class="btn btn-primary">
                                        {{$seat->seat}}
                                    </a>
                                </div>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-body">
                    <ul class="list-group list-group-flush">
                        <li class="list-group-item">
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#addSeatModal">
                                Add Seat
                            </button>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="addSeatModal" tabindex="-1" aria-labelledby="addSeatModal" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="addSeatModal">New Seat</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <form action="/admin/seat/add" method="POST">
                    @csrf
                    <div class="modal-body">
                        <div class="form-group">
                            <label for="seat">Seat Number</label>
                            <input type="text" class="form-control w-100" name="seat" id="seat" autocomplete="off" placeholder="Input seat number here" required>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Add Seat</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
