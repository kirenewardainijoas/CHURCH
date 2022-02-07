@extends('admin.layouts.main')
@section('header')
    Account Settings
@endsection
@section('card-body')
    <div class="row">
        <div class="col">
            <table class="table table-stripped">
                <thead>
                    <tr>
                        <th>User</th>
                        <th>Role</th>
                        <th>Change Role</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($accounts  as $account)
                        <tr>
                            <td>{{$account['user_name']}}</td>
                            <td>
                                @if ($account['role_name']=='Admin')
                                    <button class="btn btn-danger" >{{$account['role_name']}}</button>
                                @elseif($account['role_name']=='Umat')
                                    <button class="btn btn-success" >{{$account['role_name']}}</button>
                                @endif
                            </td>
                            <td>
                                @if ($account['role_name']=='Admin')
                                    <form action="/admin/account/role" method="POST">
                                        @csrf
                                        <input type="hidden" name="role" value="2">
                                        <input type="hidden" name="user" value="{{$account['user_id']}}">
                                        <button type="submit" class="btn btn-primary">to Umat</button>
                                    </form>
                                    @elseif($account['role_name']=='Umat')
                                    <form action="/admin/account/role" method="POST">
                                        @csrf
                                        <input type="hidden" name="role" value="1">
                                        <input type="hidden" name="user" value="{{$account['user_id']}}">
                                        <button type="submit" class="btn btn-danger">to Admin</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
