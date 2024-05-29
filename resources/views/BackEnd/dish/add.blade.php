@extends('BackEnd.master')
@section('title')
    Dish Add Page
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
                            Dish
                    </div>
                    <div class="card-body">
                        <form action="{{ route('dish_save') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <label for="">Dish Name</label>
                                <input type="text" class="form-control" name="dish_name">
                            </div>
                            <div class="form-group">
                                <label for="">Category</label>
                                <select name="category_id" class="form-control">
                                    <option>----------Select Category----------</option>
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                            <div class="form-group">
                                <label for="">Detail</label>
                                <textarea name="dish_detail" class="form-control" rows="4"></textarea>
                            </div>
                            <div class="form-group">
                                <label for="">Image </label>
                                <input type="file" class="form-control" name="dish_image">
                            </div>
                            <div class="form-group">
                                <label for="">Status</label>
                                <div class="radio">
                                    <input type="radio" name="dish_status" value="1">Active
                                    <input type="radio" name="dish_status" value="0">Inactive
                                </div>
                            </div>
                            <div class="card">
                             <div class="card-header" title="You can skip this" > Dish Attribute </div>
                                <div class="card-body">
                                    <div class="form-group">
                                        <div class="row">
                                            <div class="col-md-3">
                                                     <label for="">Full Price </label>
                                            </div>
                                            <div class="col-md-9">
                                                <input type="text" class="form-control" name="full_price" placeholder="Full" >
                                            </div>
                                            <!-- <div class="col-md-3 mt-2">
                                                    <label for="">Half Price </label>

                                            </div>
                                            <div class="col-md-9 mt-2">
                                                <input type="text" class="form-control" name="half_price" placeholder="enter second price" >
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>




                            <button type="submit" name="btn" class="btn btn-outline-primary btn-block">Dish Add</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
@endsection