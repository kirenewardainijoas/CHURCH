@extends('umat.layouts.main')
@section('header')
    Dashboard
@endsection
@section('card-body')
<div class="row">
    <div class="col">
        <div class="alert alert-success" role="alert">
            <h4 class="alert-heading">Selamat Datang!</h4>
            <hr>
            <p class="mb-0">Silahkan menggunakan menu reservation di samping kiri untuk memesan tempat</p>
        </div>
    </div>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="card bg-warning">
            <div class="card-header">Jadwal berikutnya</div>
            <div class="card-body">
                @if($next != null)
                <table class="table">
                    <tbody>
                        <tr>
                            <th>Topik</th>
                            <td>{{$next['topic']}}</td>
                        </tr>
                        <tr>
                            <th>Tanggal</th>
                            <td>{{$next['date']}}</td>
                        </tr>
                        <tr>
                            <th>Kursi</th>
                            <td>{{$next['seat']}}</td>
                        </tr>
                        <tr>
                            <th>Link</th>
                            <td>
                                @if ($next['link'] != 'offline')
                                <a href="{{$next['link']}}"></a>
                                @else
                                Offline
                                @endif
                            </td>
                        </tr>
                    </tbody>
                </table>
                @else
                    Tidak ada pemesanan
                @endif
            </div>
        </div>
    </div>
    {{-- <div class="col-md-8">
        <div class="card">
            <div class="card-header">
                Meeting Logs
            </div>
            <div class="card-body">
                <table class="table">
                    <thead>
                        <tr>
                            <th>Topic</th>
                            <th>Date</th>
                            <th>Status</th>
                            <th>Note</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <th></th>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div> --}}
</div>
@endsection
