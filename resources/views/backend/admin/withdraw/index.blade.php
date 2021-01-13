@extends('layouts.admin.app')


@section('content')

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Withdraw</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

            <form action="{{route('admin/bulk-approve-withdraw-request')}}" method="post">
                            @csrf
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th class="text-center pt-3">
                      <div class="custom-checkbox custom-checkbox-table custom-control">
                          <button type="submit" name="btn" class="btn btn-success"><i
                                      class="fas fa-arrow-circle-up"></i></Button>

                      </div>
                  </th>

                  <th>Sl.</th>
                  <th>Company</th>
                  <th>Vendor Name</th>
                  <th>Email</th>
                  <th>Phone</th>
                  <th>Method</th>
                  <th>Amount</th>
                  <th>Date</th>
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @php $i=1 @endphp
            @foreach($withdraws as $withdraw)
                <tr>
              
                  
                    <td class="text-center pt-2">
                        <div class="custom-checkbox custom-control">
                            <input type="checkbox" data-checkboxes="mygroup"
                                   class="custom-control-input"
                                   id="checkbox-{{$i}}" name="id[]"
                                   value="{{$withdraw->id}}">
                            <label for="checkbox-{{$i}}"
                                   class="custom-control-label">&nbsp;</label>
                        </div>
                    </td>

                  	<td>{{$i++}}</td>
                    <td>{{$withdraw->vendor->company ?? ''}}</td>
                    <td>{{$withdraw->vendor->name ?? ''}}</td>
                    <td>{{$withdraw->vendor->email ?? ''}}</td>
                    <td>{{$withdraw->vendor->phone ?? ''}}</td>
                    <td>{{$withdraw->paymentmethod->name ?? ''}}</td>
                    <td>{{$withdraw->amount ?? ''}}</td>
                    <td>{{$withdraw->created_at ?? ''}}</td>
	                <td>
	                    @php
	                        if($withdraw->status == 1){
	                                echo  "<div class='badge badge-success badge-shadow'>Approve</div>";
	                            }else{
	                                echo  "<div class='badge badge-danger badge-shadow'>Pending</div>";
	                            }
	                    @endphp
                      
	                </td>
                  	<td>
                      <div class="row">
                      	@if($withdraw->status == 0)
                        <?php  if($withdraw->status == 1){ ?>
                        <a href="{{route('admin/inactive-withdraw',[$withdraw->id])}}"
                           class="btn btn-success btn-sm" title="Inactive"  style="float: left;margin-right: 10px;"><i
                                    class="fa fa-arrow-down"></i></a>
                        <?php }else{ ?>
                        <a href="{{route('admin/active-withdraw',[$withdraw->id])}}"
                           class="btn btn-warning btn-sm" title="Active"  style="float: left;margin-right: 10px;"><i
                                    class="fa fa-arrow-up"></i></a>
                        <?php } ?>
                        @endif
                        <a href="{{URL::to('admin/withdraw/'.$withdraw->id)}}" title="View" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                            </button>
                        </a>
<!--                         <form action="{{URL::to('admin/withdraw/'.$withdraw->id)}}" method="post">
                        	@csrf
                        	@method('DELETE')
                        	<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                        </form> -->
                      </div>

                  </form>

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