@extends('BackEnd.master')
@section('title')
    Delivery Add Page
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="offset-3 col-md-5 my-lg-5">
            @if(Session::get('sms'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
                <div class="card">
                    
                    <div class="card-header text-center">
                            Delivery
                    </div>
                    <div class="card-body">
                        <form action="{{ route('delivery_save') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Delivery Name</label>
                                <input type="text" class="form-control" name="delevery_boy_name">
                            </div>
                            <div class="form-group">
                                <label for="">Phone Number</label>
                                <input type="text" class="form-control" name="delevery_boy_phone_number">
                            </div>
                            <div class="form-group">
                                <label for="">Password</label>
                                <input type="password" class="form-control" name="delevery_boy_password">
                            </div>
                            <div class="form-group">
                                <label for="">Added On</label>
                                <input type="date" class="form-control" name="added_on">
                            </div>
                            <div class="form-group">
                                <label for="">Delevery Status</label>
                                <div class="radio">
                                    <input type="radio" name="delevery_boy_status" value="1">Active
                                    <input type="radio" name="delevery_boy_status" value="0">Inactive
                                </div>

                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">DeliveryBoy Add</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection