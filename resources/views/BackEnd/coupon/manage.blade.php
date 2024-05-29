@extends('BackEnd.master')
@section('title')
    Coupon Manage
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
                <h3 class="card-title">Coupon List</h3>
              </div>
              <!-- /.card-header -->
              
              <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No.</th>
                    <th> Code </th>
                    <th>Type</th>
                    <th>Value</th>
                    <th>Card Min</th>
                    <th>Expired On </th>
                    <th>Added On </th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
                    @php($i=1)
                    @foreach ($coupons as $coupon)
                  <tr>
                    <td>{{ $i++ }}</td>
                    <td>{{ $coupon->coupon_code }} </td>
                    <td>@if( $coupon->coupon_type==1) Percentage @else  fixed  @endif</td>
                    <td>{{ $coupon->coupon_value}} </td>
                    <td>{{ $coupon->coupon_min_value}} </td>
                    <td>{{ $coupon->expired_on}} </td>
                    <td>{{ $coupon->added_on}} </td>
                    <td>
                        @if($coupon->coupon_status == 1 )
                          <a class="btn btn-success" href="{{ route('Inactive_coupon' , ['coupon_id'=>$coupon->coupon_id]) }}"><i class="fas fa-arrow-up" title="Click to active"></i></a>
                        @else
                          <a class="btn btn-warning" href="{{ route('coupon_active' , ['coupon_id'=>$coupon->coupon_id]) }}"><i class=" fas fa-arrow-down" title="Click to Inactive"></i></a>

                        @endif
                        <a type="button" class="btn btn-dark" data-toggle="modal" data-target="#edit{{ $coupon->coupon_id }}" ><i class=" fas fa-edit"title="Click to Edit"></i></a>
                        <a class="btn btn-danger" href="{{ route('coupon_delete' , ['coupon_id'=>$coupon->coupon_id]) }}"><i class=" fas fa-trash" title="Click to destroy"></i></a>

                    </td>
                  </tr>
                 <!-- ------------------------------------Modal Start----------------------------- -->
                 
                  <div class="modal fade" id="edit{{ $coupon->coupon_id }}" tabindex="-1" role="dialog" arial-labelledby="exampleModallabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                      <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Update Coupon</h5>
                            <button  type="button" class="close" data-dismiss="modal" aria-label="CLose">
                              <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                          <div class="modal-body">
                            <form action="{{ route('coupon_update' ,['coupon_id'=>$coupon->coupon_id ]) }}" method="post" >
                              @csrf
                              <div class="form-group">
                                <label for=""> Code Name</label>
                                <input type="text" name="coupon_code" class="form-control" value="{{ $coupon->coupon_code }}" id="">
                                <input type="hidden" class="form-control" name="coupon_id" value="{{ $coupon->coupon_id }}">
                              </div>
                              <div class="form-group">
                              <label for=""> Coupon Value</label>
                                <input type="number" name="coupon_value" class="form-control" id="" value="{{ $coupon->coupon_value }}">

                              </div>
                              <div class="form-group">
                              <label for=""> Coupon Min Value</label>
                                <input type="number" name="coupon_min_value" class="form-control" id="" value="{{ $coupon->coupon_min_value }}">

                              </div>
                              <div class="form-group">
                                <label for=""> coupon Type</label>
                                    <div class="radio">
                                        <input type="radio" name="coupon_type" value="1">Percentage
                                        <input type="radio" name="coupon_type" value="0">Fixed
                                    </div>
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

