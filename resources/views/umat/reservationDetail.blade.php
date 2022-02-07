@extends('umat.layouts.main')
@section('header')
    Detail Pemesanan
@endsection
@section('card-body')
    <div class="row">
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Detail</div>
                <div class="card-body">
                    <table class="table">
                        <tbody>
                            <tr>
                                <th>Topik</th>
                                <td>{{$jadwal->title}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal dan Waktu</th>
                                <td>{{$jadwal->jadwal}}</td>
                            </tr>
                            <tr>
                                <th>Kursi</th>
                                <td>{{$seat->seat}}</td>
                            </tr>
                            <tr>
                                <th>Status</th>
                                <td class="badge @if($detail->status=='reserved') badge-warning @elseif($detail->status=='canceled') badge-danger @elseif($detail->status=='used') badge-success @endif my-auto">{{$detail->status}}</td>
                            </tr>
                            <tr>
                                <th>Penjelasan</th>
                                <td>{{$detail->description}}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            <div class="row">
                <div class="card">
                    <div class="card-header">Posisi Kursi</div>
                    <div class="card-body">
                        <div class="d-flex flex-row flex-wrap">
                            @foreach ($allSeats as $seating)
                                <div class="col-md-3 my-2">
                                    @if ($seating->id == $detail->seat)
                                        <button class="btn btn-primary">{{$seating->seat}}</button>
                                    @else
                                        <button class="btn btn-secondary" disabled>{{$seating->seat}}</button>
                                    @endif
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <a href="/umat/reservation" class="btn btn-secondary w-100 my-5">Kembali</a>
            </div>
        </div>
    </div>
@endsection
