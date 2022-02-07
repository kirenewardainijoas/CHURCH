@extends('admin.layouts.main')
@section('header')
    History for {{$specific->title}} - {{$specific->jadwal}}
@endsection

@section('card-body')
    <div class="row mb-3">
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
    <div class="row">
        <div class="col">
            <table class="table table-light">
                <thead>
                    <tr>
                        <th>Name</th>
                        <th>Temp</th>
                        <th>Time</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($logs as $log)
                        <tr>
                            <td>{{$log['user_name']}}</td>
                            <td>{{$log['temp']}}</td>
                            <td>{{$log['time']}}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
