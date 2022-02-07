@extends('umat.layouts.main')
@section('header')
    Reservation
@endsection
@section('card-body')
    @if (Session::has('success'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('success')}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
    @endif
    @if ($rfid == false)
        <div class="row">
            <div class="col">
                <div class="alert alert-danger text-center">
                    <h1>Anda belum mendaftarkan kartu Anda!</h1>
                    <h5>agar dapat memesan tempat, Anda harus mendaftarkan kartu Anda</h5>
                    <h5>Silahkan menghubungi sekretaris gereja untuk mendaftar</h5>
                </div>
            </div>
        </div>
    @elseif ($rfid == true)

        <div class="row">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-success">Pemesanan</div>
                    <div class="card-body" style="overflow-x:auto">
                        <table class="table table-border table-hover rounded" >
                            <thead>
                                <th>Tanggal</th>
                                <th>Topik</th>
                                <th>Kursi</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </thead>
                            <tbody>
                                @foreach ($bookeds as $booked)
                                    <tr class="@if($booked['status']=='reserved') table-warning @elseif($booked['status']=='canceled') table-danger @elseif($booked['status']=='used') table-success @endif">
                                        <td>{{$booked['reservation_date']}}</td>
                                        <td>{{$booked['title']}}</td>
                                        <td>{{$booked['seat']}}</td>
                                        <td>{{$booked['status']}}</td>
                                        <td>
                                            <a href="/umat/reservation/detail/{{$booked['id']}}" class="btn btn-primary" data-toggle="tooltip" data-placement="right" title="Booking details">
                                                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                                                    <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
                                                </svg>
                                            </a>
                                            <form action="/umat/reservation/cancel" method="post">
                                                @csrf
                                                <input type="hidden" name="bookId" value="{{$booked['id']}}">
                                                <button type="submit" class="btn btn-danger" data-toggle="tooltip" data-placement="right" title="Cancel this booking">
                                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x-square-fill" viewBox="0 0 16 16">
                                                        <path d="M2 0a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2H2zm3.354 4.646L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 1 1 .708-.708z"/>
                                                    </svg>
                                                </button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header bg-primary">Jadwal Tersedia</div>
                    <div class="card-body">
                        <div class="alert alert-warning">
                            Silahkan menekan tombol "Pesan" untuk melakukan pemesanan
                        </div>
                        <table class="table table-border table-hover rounded">
                            <thead>
                                <th>Tanggal</th>
                                <th>Topik</th>
                                <th>Link</th>
                                <th>Pesan</th>
                            </thead>
                            <tbody>
                                @foreach ($schedules as $schedule)
                                    <tr>
                                        <td>{{$schedule->jadwal}}</td>
                                        <td>{{$schedule->title}}</td>
                                        <td><a href="{{$schedule->meeting_link}}" target="_blank" class="btn btn-danger">Online</td>
                                        <td>
                                            <form action="/umat/reservation/book" method="get">
                                                <input type="hidden" name="scheduleId" value="{{$schedule->id}}">
                                                <button type="submit" class="btn btn-primary">Pesan</button>
                                            </form>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        Pemesanan Lama
                    </div>
                    <div class="card-body">
                        <table class="table table-hover">
                            <thead>
                                <th>Date</th>
                                <th>Topic</th>
                                
                            </thead>
                            <tbody style="max-height:500px; overflow-y:auto" >
                                @foreach ($passed as $pass)
                                    <tr>
                                        <td>{{$pass['jadwal']}}</td>
                                        <td>{{$pass['title']}}</td>

                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    @endif
@endsection
