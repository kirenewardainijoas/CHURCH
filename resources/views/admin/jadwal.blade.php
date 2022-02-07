@extends('admin.layouts.main')
@section('header')
    Schedule
@endsection
@section('card-body')
    <div class="row">
        <div class="col-md-8">
            <div class="card  @if(count($schedules)<1) bg-success @else bg-warning  @endif">
                <div class="card-header">
                    Upcoming
                </div>
                <div class="card-body">
                    @if(count($schedules)<1)
                        <h3>No upcoming schedule</h3>
                    @else
                        <table class="table table-small table-border table-hover">
                            <thead>
                                <tr>
                                    <th>Date</th>
                                    <th>Topic</th>
                                    <th>Link</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>{{$next->jadwal}}</td>
                                    <td>{{$next->title}}</td>
                                    <td>
                                        @if ($next->meeting_link == 'offline')
                                            <a href="#" class="btn btn-secondary disabled">{{$next->meeting_link}}</a>
                                        @else
                                            <a href="{{$next->meeting_link}}" class="btn btn-primary">Link</a>
                                        @endif
                                </td>
                                </tr>
                            </tbody>
                        </table>
                    @endif
                </div>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card">
                <div class="card-header">Action</div>
                <div class="card-body text-center">
                    <button class="btn btn-primary" type="button" data-toggle="modal" data-target="#scheduleModal">Create Schedule</button>
                </div>
            </div>
        </div>
    </div>
    <div class="row mt-2">
        <div class="col">
            <div class="card">
                <div class="card-header">
                    Scheduled
                </div>
                <div class="card-body">
                    <table class="table table-small table-hover table-border">
                        <thead>
                            <tr>
                                <th>Date</th>
                                <th>Topic</th>
                                <th>Link</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($schedules as $schedule)
                                <tr>
                                    <td>{{$schedule->jadwal}}</td>
                                    <td>{{$schedule->title}}</td>
                                    <td>
                                        @if ($schedule->meeting_link == 'offline')
                                            <a href="#" class="btn btn-secondary disabled">{{$schedule->meeting_link}}</a>
                                        @else
                                            <a href="{{$schedule->meeting_link}}" class="btn btn-primary ">Link</a>
                                        @endif
                                    </td>
                                    <td>
                                        <form action="/admin/schedule/delete" method="post">
                                            @csrf
                                            <a href="/admin/schedule/detail/{{$schedule->id}}" class="btn btn-outline-primary "><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-binoculars-fill" viewBox="0 0 16 16">
                                                <path d="M4.5 1A1.5 1.5 0 0 0 3 2.5V3h4v-.5A1.5 1.5 0 0 0 5.5 1h-1zM7 4v1h2V4h4v.882a.5.5 0 0 0 .276.447l.895.447A1.5 1.5 0 0 1 15 7.118V13H9v-1.5a.5.5 0 0 1 .146-.354l.854-.853V9.5a.5.5 0 0 0-.5-.5h-3a.5.5 0 0 0-.5.5v.793l.854.853A.5.5 0 0 1 7 11.5V13H1V7.118a1.5 1.5 0 0 1 .83-1.342l.894-.447A.5.5 0 0 0 3 4.882V4h4zM1 14v.5A1.5 1.5 0 0 0 2.5 16h3A1.5 1.5 0 0 0 7 14.5V14H1zm8 0v.5a1.5 1.5 0 0 0 1.5 1.5h3a1.5 1.5 0 0 0 1.5-1.5V14H9zm4-11H9v-.5A1.5 1.5 0 0 1 10.5 1h1A1.5 1.5 0 0 1 13 2.5V3z"/>
                                            </svg>
                                            </a>
                                            <input type="hidden" name="scheduleId" value="{{$schedule->id}}">
                                            <button type="submit" class="btn btn-danger">
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
    </div>
    <div class="modal fade" id="scheduleModal" tabindex="-1" aria-labelledby="scheduleModal" aria-hidden="true">
        <form action="/admin/schedule/create" method="post">
            @csrf
        <div class="modal-dialog modal-xl">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="scheduleModal">Schedule a meeting</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                <div class="col">
                            <div class="form-group">
                                <label for="title">Meeting title</label>
                                <input type="text" name="title" class="form-control" autocomplete="false" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Meeting date and time</label>
                                <input type="datetime-local" name="jadwal" class="form-control" id="jadwal" autocomplete="false" required>
                            </div>
                            <div class="form-group">
                                <label for="title">Description</label>
                                <input type="text" name="desc" class="form-control" autocomplete="false">
                            </div>
                            <div class="form-group">
                                <label for="title">Meeting URL</label>
                                <input type="text" name="link" class="form-control" autocomplete="false" placeholder="leave blank if fully offline">
                            </div>
                        </div>
                        <div class="col-md-8 d-none">
                            <div class="alert alert-warning">Check for making seat available to book</div>
                            <div class="card">
                                <div class="card-header">Meeting Seat Configuration</div>
                                <div class="card-body">
                                    <div class="row">
                                        <div class="col d-flex flex-wrap">
                                            @foreach ($seats as $seat)
                                                <div class="col-md-3 my-2">
                                                    {{-- <button class="btn btn-primary" type="button">{{$seat->seat}}</button> --}}
                                                    <div class="form-check">
                                                        <input type="checkbox" class="form-check-input" name="{{$seat->id}}" checked>
                                                        <label for="{{$seat->id}}" class="form-check-label">{{$seat->seat}}</label>
                                                    </div>
                                                </div>
                                            @endforeach
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>
            </div>
        </div>
    </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js" integrity="sha512-2rNj2KJ+D8s1ceNasTIex6z4HWyOnEYLVC3FigGOmyQCZc2eBXKgOxQmo3oKLHyfcj53uz4QMsRCWNbLd32Q1g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/fontawesome.min.css" integrity="sha512-Rcr1oG0XvqZI1yv1HIg9LgZVDEhf2AHjv+9AuD1JXWGLzlkoKDVvE925qySLcEywpMAYA/rkg296MkvqBF07Yw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/moment.js/2.29.1/moment.min.js" integrity="sha512-qTXRIMyZIFb8iQcfjXWCO8+M5Tbc38Qi5WzdPOYZHIlZpzBHG3L3by84BBBOiRGiEb7KKtAOAs5qYdUiZiQNNQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="{{asset('css/jquery.simple-dtpicker.css')}}">
    <script src="{{asset('js/jquery.simple-dtpicker.js')}}"></script>
    <script>

        $(function(){
            $('#jadwal').dtpicker();
        });
    </script>
@endsection
