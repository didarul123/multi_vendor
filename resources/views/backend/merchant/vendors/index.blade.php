@extends('layouts.merchant.app')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Vendor</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Company</th>
                  <th>Address</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @php $i=1 @endphp
            @foreach($vendors as $vendor)
                <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$vendor->name}}</td>
                    <td>{{$vendor->email}}</td>
                    <td>{{$vendor->phone}}</td>
                    <td>{{$vendor->company}}</td>
                    <td>{{$vendor->address}}</td>
	                <td>
	                    @php
	                        if($vendor->status == 1){
	                                echo  "<div class='badge badge-success badge-shadow'>Active</div>";
	                            }else{
	                                echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
	                            }
	                    @endphp
                      
	                </td>
                  	<td>
                      <div class="row">

                        <a href="{{route('merchant/vendor-profile', $vendor->id)}}" title="Edit" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                            </button>
                        </a>

                        <a href="{{route('merchant/send-message', $vendor->id)}}" title="Send Message" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-paper-plane"></i>
                            </button>
                        </a>

                        <a href="{{route('merchant/show-message', $vendor->id)}}" title="Send Message" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-reply-all"></i>
                            </button>
                        </a>

                      </div>


                  	</td>
                </tr>
				@endforeach
	
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->

        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>


@endsection