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
                            Coupon Code
                    </div>
                    <div class="card-body">
                        <form action="{{ route('coupon_save') }}" method="post">
                            @csrf
                            <div class="form-group">
                                <label for="">Code Name</label>
                                <input type="text" class="form-control" name="coupon_code">
                            </div>
                            <div class="form-group">
                                <label for="">Coupon Value</label>
                                <input type="number" class="form-control" name="coupon_value">
                            </div>
                            <div class="form-group">
                                <label for="">Cart Min Value</label>
                                <input type="number" class="form-control" name="coupon_min_value">
                            </div>
                            <div class="form-group">
                                <label for="">Expired Date</label>
                                <input type="date" class="form-control" name="expired_on">
                            </div>
                            <div class="form-group">
                                <label for="">Added On</label>
                                <input type="date" class="form-control" name="added_on">
                            </div>
                            <div class="form-group">
                                <label for="">Select Coupon Type</label>
                                <div class="radio">
                                    <input type="radio" name="coupon_type" value="1">Percentage
                                    <input type="radio" name="coupon_type" value="0">Fixed
                                </div>

                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio">
                                    <input type="radio" name="coupon_status" value="1">Active
                                    <input type="radio" name="coupon_status" value="0">Inactive
                                </div>

                            </div>
                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Coupon Add</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection