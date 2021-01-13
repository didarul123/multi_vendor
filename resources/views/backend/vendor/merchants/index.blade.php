@extends('layouts.vendor.app')

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
            @foreach($merchants as $merchant)
                <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$merchant->name}}</td>
                    <td>{{$merchant->email}}</td>
                    <td>{{$merchant->phone}}</td>
                    <td>{{$merchant->company}}</td>
                    <td>{{$merchant->address}}</td>
	                <td>
	                    @php
	                        if($merchant->status == 1){
	                                echo  "<div class='badge badge-success badge-shadow'>Active</div>";
	                            }else{
	                                echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
	                            }
	                    @endphp
                      
	                </td>
                  	<td>
                      <div class="row">

                        <a href="{{route('vendor/merchant-profile', $merchant->id)}}" title="Edit" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                            </button>
                        </a>

<!--                         <a href="{{route('vendor/send-message', $merchant->id)}}" title="Send Message" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-paper-plane"></i>
                            </button>
                        </a> -->

                        <a href="{{route('vendor/show-message', $merchant->id)}}" title="Send Message" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fas fa-comment-dots"></i> 
                              <?php
                                $count_msg = App\Models\Message::where('sender_id', $merchant->id)->where('sender_type', 'merchant')->where('recever_id', $user_id)->where('recever_type', $user_type)->select('is_read')->where('is_read', 0)->count();
                              ?>
                              <span class="count">{{$count_msg}}</span>

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