@extends('BackEnd.master')
@section('title')
    Category manage
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
                <h3 class="card-title">DataTable with default features</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th>Category Name </th>
                    <th>Order Number</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach ($categories as $cate)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $cate->category_name }} </td>
                    <td>{{ $cate->order_number}} </td>
                    <td>
                        @if($cate->category_status == 1 )
                          <a class="btn btn-success" href="{{ route('Inactive_cate' , ['category_id'=>$cate->category_id]) }}"><i class="fas fa-arrow-up" title="Click to active"></i></a>
                        @else
                          <a class="btn btn-warning" href="{{ route('category_active' , ['category_id'=>$cate->category_id]) }}"><i class=" fas fa-arrow-down" title="Click to Inactive"></i></a>

                        @endif
                        <a type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit{{ $cate->category_id }}" ><i class=" fas fa-edit"title="Click to Edit"></i></a>
                        <a class="btn btn-danger" href="{{ route('cate_delete' , ['category_id'=>$cate->category_id]) }}"><i class=" fas fa-trash" title="Click to destroy"></i></a>

                    </td>
                  </tr>
                  <!-- ------------------------------------Modal Start----------------------------- -->
                 
                  <div class="modal fade" id="edit{{ $cate->category_id }}" tabindex="-1" role="dialog" arial-labelledby="exampleModallabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Category</h5>
                            <button  type="button" class="close" data-dismiss="modal" aria-label="CLose">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                          <div class="modal-body">
                            <form action="{{ route('cate_update' ,['category_id'=>$cate->category_id]) }}" method="post" >
                              @csrf
                              <div class="form-group">
                                <label for="">Category Name</label>
                                <input type="text" name="category_name" class="form-control" value="{{ $cate->category_name }}" id="">
                                <input type="hidden" class="form-control" name="category_id" value="{{ $cate->category_id }}">
                              </div>
                              <div class="form-group">
                                <input type="number" name="order_number" class="form-control" id="" value="{{ $cate->order_number }}">

                              </div>
                              <div class="form-group">
                                <input type="submit" name="btn" class="btn btn-primary"value="Update">
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
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>

@endsection

