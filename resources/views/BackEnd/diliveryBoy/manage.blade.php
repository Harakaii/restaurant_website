@extends('BackEnd.master')
@section('title')
    Delivery Manage
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
                <h3 class="card-title">Delivery List</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th> Name </th>
                    <th>Phone Number</th>
                    <th>Added On</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach ($boys as $boy)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $boy->delevery_boy_name }} </td>
                    <td>{{ $boy->delevery_boy_phone_number}} </td>
                    <td>{{ $boy->added_on}} </td>
                    <td>
                        @if($boy->delevery_boy_status == 1 )
                          <a class="btn btn-success" href="{{ route('Inactive_delivery' , ['delevery_boy_id'=>$boy->delevery_boy_id]) }}"><i class="fas fa-arrow-up" title="Click to active"></i></a>
                        @else
                          <a class="btn btn-warning" href="{{ route('delivery_active' , ['delevery_boy_id'=>$boy->delevery_boy_id]) }}"><i class=" fas fa-arrow-down" title="Click to Inactive"></i></a>

                        @endif
                        <a type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit{{ $boy->delevery_boy_id }}" ><i class=" fas fa-edit"title="Click to Edit"></i></a>
                        <a class="btn btn-danger" href="{{ route('delivery_delete' , ['delevery_boy_id'=>$boy->delevery_boy_id]) }}"><i class=" fas fa-trash" title="Click to destroy"></i></a>

                    </td>
                  </tr>
                  <!-- ------------------------------------Modal Start----------------------------- -->
                 
                  <div class="modal fade" id="edit{{ $boy->delevery_boy_id }}" tabindex="-1" role="dialog" arial-labelledby="exampleModallabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Delivery</h5>
                            <button  type="button" class="close" data-dismiss="modal" aria-label="CLose">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                          <div class="modal-body">
                            <form action="{{ route('delivery_update' ,['delevery_boy_id'=>$boy->delevery_boy_id ]) }}" method="post" >
                              @csrf
                              <div class="form-group">
                                <label for=""> Name</label>
                                <input type="text" name="delevery_boy_name" class="form-control" value="{{ $boy->delevery_boy_name }}" id="">
                                <input type="hidden" class="form-control" name="delevery_boy_id" value="{{ $boy->delevery_boy_id }}">
                              </div>
                              <div class="form-group">
                              <label for=""> Phone Number</label>
                                <input type="text" name="delevery_boy_phone_number" class="form-control" id="" value="{{ $boy->delevery_boy_phone_number }}">

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
            <!-- /.card-body  -->
            </div>
             <!-- /.card  -->
          </div>

@endsection

