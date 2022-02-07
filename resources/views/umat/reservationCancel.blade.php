@extends('umat.layouts.main')
@section('header')
    Pembatalan Pemesanan
@endsection
@section('card-body')
    <div class="row">
        <div class="col-md-5 mx-auto">
            <div class="card card-danger">
                <div class="card-header">Apakah Anda yakin untuk membatalkan pemesanan ini?</div>
                <div class="card-body">
                    <table class="table table-small">
                        <tbody>
                            <tr>
                                <th>Topik</th>
                                <td>{{$jadwal->title}}</td>
                            </tr>
                            <tr>
                                <th>Tanggal dan waktu</th>
                                <td>{{$jadwal->jadwal}}</td>
                            </tr>
                            <tr>
                                <th>Kursi</th>
                                <td>{{$seat->seat}}</td>
                            </tr>

                        </tbody>
                    </table>
                </div>
                <div class="card-footer">
                    <div class="d-flex flex-row justify-content-end">
                        <a href="/umat/reservation/" class="btn btn-primary mr-2">Back</a>
                        <form action="/umat/reservation/cancel/yes" method="POST">
                            @csrf
                            <input type="hidden" name="bookId" value="{{$detail->id}}">
                            <button type="submit" class="btn btn-secondary">Confirm</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
