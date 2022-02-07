@extends('admin.layouts.main')
@section('header')
    Dashboard
@endsection

@section('card-body')
<div class="row">
    <div class="col">
        <canvas id="myChart" width="400" height="180"></canvas>


    </div>
</div>
<div class="row">
    <div class="col-md-4">
        <div class="card bg-success">
            <div class="card-header">
                Next Event
            </div>
            <div class="card-body">
                @if ($nextSchedule)
                    <h6>{{$nextSchedule->jadwal}}</h6>
                    @if ($nextSchedule->meeting_link == 'offline')
                        <a href="#" class="badge badge-secondary disabled">{{$nextSchedule->meeting_link}}</a>
                    @else
                        <a href="{{$nextSchedule->meeting_link}}" class="badge badge-primary">Link</a>
                    @endif
                    <p>{{$nextSchedule->title}}</p>
                @else
                    <h6>No Schedule</h6>
                @endif
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-warning">
            <div class="card-header">
                Scheduled Events
            </div>
            <div class="card-body">
                <h3>{{$countSchedule}} Events</h3>
            </div>
        </div>
    </div>
    <div class="col-md-4">
        <div class="card bg-light">
            <div class="card-header">
                RFID
            </div>
            <div class="card-body">
                <h6><span class="badge badge-success">{{$registered}} User</span>Registered</h6>
                <h6><span class="badge badge-danger">{{$notRegistered}} User</span>Unregistered</h6>
            </div>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.6.0/chart.min.js" integrity="sha512-GMGzUEevhWh8Tc/njS0bDpwgxdCJLQBWG3Z2Ct+JGOpVnEmjvNx6ts4v6A2XJf1HOrtOsfhv3hBKpK9kE5z8AQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    const ctx = document.getElementById('myChart').getContext('2d');
    const myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: [{!!$dates!!}],
            datasets: [{
                label: 'Seat Available',
                data: [{!!$seats!!}],
                backgroundColor: [

                    'rgba(153, 102, 255, 0.2)',

                ],
                borderColor: [

                    'rgba(153, 102, 255, 1)',

                ],
                borderWidth: 1
            },{
                label: 'Reserved',
                data: [{!!$reserved!!}],
                backgroundColor: [
                    'rgba(255, 99, 132, 0.2)',
                ],
                borderColor: [
                    'rgba(255, 99, 132, 1)',
                ],
                borderWidth: 1
            },{
                label: 'Approved',
                data: [{!!$approved!!}],
                backgroundColor: [

                    'rgba(54, 162, 235, 0.2)',

                ],
                borderColor: [

                    'rgba(54, 162, 235, 1)',

                ],
                borderWidth: 1
            },{
                label: 'Rejected',
                data: [{!!$rejected!!}],
                backgroundColor: [


                    'rgba(255, 206, 86, 0.2)',

                ],
                borderColor: [

                    'rgba(255, 206, 86, 1)',

                ],
                borderWidth: 1
            },{
                label: 'Canceled',
                data: [{!!$canceled!!}],
                backgroundColor: [

                    'rgba(75, 192, 192, 0.2)',

                ],
                borderColor: [

                    'rgba(75, 192, 192, 1)',

                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });
    </script>
@endsection
