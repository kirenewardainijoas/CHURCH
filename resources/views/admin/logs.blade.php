@extends('admin.layouts.main')
@section('header')
    History
@endsection

@section('card-body')
    <div class="row">
        <div class="col">
            <form action="/admin/log/detail" method="get">
                <div class="row">
                    <div class="col">
                        <select name="jadwal_id" id="jadwal_id" class="form-control">
                            @foreach ($jadwals as $jadwal)
                                <option value="{{$jadwal->id}}" class="form-control">{{$jadwal->title}} - {{$jadwal->jadwal}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary">Tampilkan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
