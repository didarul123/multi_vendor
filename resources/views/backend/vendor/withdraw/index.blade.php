@extends('layouts.vendor.app')


@section('content')

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">My Withdraw</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Withdraw Date</th>
                  <th>Method</th>
                  <th>Account</th>
                  <th>Amount</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
            @php $i=1 @endphp
            @foreach($withdraws as $withdraw)
                <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$withdraw->created_at ?? ''}}</td>
                    <td>{{$withdraw->paymentmethod->name ?? ''}}</td>
                    <td>{{$withdraw->account ?? ''}}</td>
                    <td>{{$withdraw->amount ?? ''}}</td>
	                <td>
	                    @php
	                        if($withdraw->status == 1){
	                                echo  "<div class='badge badge-success badge-shadow'>Approve</div>";
	                            }else{
	                                echo  "<div class='badge badge-danger badge-shadow'>Pending</div>";
	                            }
	                    @endphp
                      
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