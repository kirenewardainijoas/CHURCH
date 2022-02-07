@extends('admin.layouts.main')
@section('header')
    RFID Registration
@endsection
@section('card-body')
    <div class="row d-flex flex-row flex-wrap">
            <div class="col-md-6">
            <div class="card">
                <div class=" card-header ">
                    <span class="badge badge-success">
                        {{$registered}} user
                    </span>
                    Registered
                </div>
                <div class="card-body">
                
                    <table class="table-sm table-hover w-100 table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        
                        <tbody>
                        

                            @foreach ($combined as $data)
                                @if ($data['rfid']==true)
                                    <tr>
                                        <td>{{$data['user_name']}}</td>
                                        <td class="text-center">
                                            <a href="/admin/rfid/update/{{$data['user_id']}}" class="btn btn-warning">Update</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach

                        </tbody>
                    </table>
                    
                </div>
                
            </div>
        </div>
       
                    
                
        <div class="col-md-6">
            <div class="card">
                <div class=" card-header ">
                    <span class="badge badge-danger">
                        {{$notRegistered}} user
                    </span>
                    Not Registered
                </div>
                <div class="card-body">
                    <table class="table-sm table-hover w-100 table-bordered">
                        <thead>
                            <tr>
                                <th>Name</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($combined as $data)
                                @if ($data['rfid']==false)
                                    <tr>
                                        <td>{{$data['user_name']}}</td>
                                        <td class=" text-center">
                                            <a href="/admin/rfid/record/{{$data['user_id']}}" class="btn btn-primary">Record</a>
                                        </td>
                                    </tr>
                                @endif
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
