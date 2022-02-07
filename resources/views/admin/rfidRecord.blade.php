@extends('admin.layouts.main')
@section('header')
    RFID Record
@endsection
@section('card-body')
    <div class="row">
        <div class="col text-center">
            <h3>{{$user->name}}</h3>
            <form action="/admin/rfid/record" method="post">
                @csrf
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="card mx-auto text-center my-2">
                            <svg xmlns="http://www.w3.org/2000/svg"  fill="currentColor" class="m-2 text-danger mx-auto bi bi-person-badge w-75" viewBox="0 0 16 16">
                                <path d="M6.5 2a.5.5 0 0 0 0 1h3a.5.5 0 0 0 0-1h-3zM11 8a3 3 0 1 1-6 0 3 3 0 0 1 6 0z"/>
                                <path d="M4.5 0A2.5 2.5 0 0 0 2 2.5V14a2 2 0 0 0 2 2h8a2 2 0 0 0 2-2V2.5A2.5 2.5 0 0 0 11.5 0h-7zM3 2.5A1.5 1.5 0 0 1 4.5 1h7A1.5 1.5 0 0 1 13 2.5v10.795a4.2 4.2 0 0 0-.776-.492C11.392 12.387 10.063 12 8 12s-3.392.387-4.224.803a4.2 4.2 0 0 0-.776.492V2.5z"/>
                            </svg>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6 mx-auto">
                        <div class="form-group">
                            <input type="text" class="form-control " name="rfid_uid" autofocus autocomplete="false" required>
                            <input type="hidden" name="user_id" value="{{$user->id}}">
                            <label for="UID">Please tap RFID on reader</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Register</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
