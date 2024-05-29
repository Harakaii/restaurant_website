@extends('BackEnd.master')
@section('title')
    Dish Manage
@endsection
@section('content')
          <!-- alert -->
          @if(Session::get('sms'))
                <div class="alert alert-warning alert-dismissible fade show" role="alert">
                        <strong>{{ Session::get('sms') }}</strong> 
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
          @endif
          <div class="card">
              <div class="card-header">
                <h3 class="card-title">Dish List</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Dish name </th>
                    <th>Category name </th>
                    <th>Dish Detail</th>
                    <th>Image</th>
                    <th>Added On</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach ($dishes as $dish)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $dish->dish_name }} </td>
                    <td>{{ $dish->category_name}} </td>
                    <td>{{ $dish->dish_detail}} </td>
                    <td>
                        <img src="{{ asset($dish->dish_image) }} " height="25px" width="60px" class="img-fluid img-thumbnail">
                    </td>
                    <td>{{ $dish->created_at}} </td>

                    <td>
                        @if($dish->dish_status == 1 )
                          <a class="btn btn-success" href="{{ route('Inactive_dish' , ['dish_id'=>$dish->dish_id]) }}"><i class="fas fa-arrow-up" title="Click to active"></i></a>
                        @else
                          <a class="btn btn-warning" href="{{ route('dish_active' , ['dish_id'=>$dish->dish_id]) }}"><i class=" fas fa-arrow-down" title="Click to Inactive"></i></a>

                        @endif
                        <a type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit{{ $dish->dish_id }}" ><i class=" fas fa-edit"title="Click to Edit"></i></a>
                        <a class="btn btn-danger" id="delete" href="{{ route('dish_delete' , ['dish_id'=>$dish->dish_id]) }}"><i class=" fas fa-trash" title="Click to destroy"></i></a>

                    </td>
                  </tr>
                  <!-- ------------------------------------Modal Start----------------------------- -->
                 
                  <div class="modal fade" id="edit{{ $dish->dish_id }}" tabindex="-1" role="dialog" arial-labelledby="exampleModallabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Dish</h5>
                            <button  type="button" class="close" data-dismiss="modal" aria-label="CLose">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                          <div class="modal-body">
                            <form action="{{ route('dish_update' ,['dish_id'=>$dish->dish_id ]) }}" method="post" enctype="multipart/form-data">
                              @csrf
                              <div class="form-group">
                                <label for=""> Dish Name</label>
                                <input type="text" name="dish_name" class="form-control" value="{{ $dish->dish_name }}" id="">
                                <input type="hidden" class="form-control" name="dish_id" value="{{ $dish->dish_id }}">
                              </div>
                              <div class="form-group">
                              <label for=""> Previous Category</label>
                              <input type="text" name="dish_name" class="form-control" value="{{ $dish->dish_name }}" id="">

                              </div>
                              <div class="form-group">
                                    <label for="">New Category</label>
                                    <select name="category_id" class="form-control">
                                        <option>----------Select Category----------</option>
                                        @foreach ($categories as $cate)
                                            <option value="{{ $cate->category_id }}">{{ $cate->category_name }}</option>
                                        @endforeach
                                    </select>
                               </div>
                                <div class="form-group">
                                    <label for="">Detail</label>
                                    <textarea name="dish_detail" class="form-control" rows="2">{{ $dish->dish_detail }}</textarea>
                                </div>

                              <div class="form-group">
                                <label for="">Previous Image </label>
                                 <img src="{{ asset($dish->dish_image) }} " style="height: 150px;width: 150px;">
                                 <input type="file" class="form-control" name="dish_image" accept="image/*">
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
                                                <input type="text" class="form-control" name="full_price" value="{{ $dish->full_price }}">
                                            </div>
                                            <!-- <div class="col-md-3 mt-2">
                                            <label for="">Half Price </label>
                                            </div>
                                            <div class="col-md-9 mt-2">
                                                <input type="text" class="form-control" name="half_price" value="{{ $dish->half_price }}" >
                                            </div> -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-outline-primary btn-block"value="Update">
                              </div>



                            </form>
                          </div> 


                       
                      </div>
                    </div>
                  </div>



                  @endforeach


                  </tbody>
                 </table>
              </div>
            <!-- /.card-body  -->
            </div>
             <!-- /.card  -->
          </div>

@endsection

