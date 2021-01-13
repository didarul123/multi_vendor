@extends('layouts.merchant.app')

@section('content')


    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Product</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Invoice Id</th>
                  <th>Total QTY</th>
                  <th>Total Cost</th>
                  <th>Payment Method</th>
                  <th>Transaction Id</th>
                  <th>Status</th>
                </tr>
                </thead>
                <tbody>
            @php $i=1 @endphp
            @foreach($orders as $order)
                <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$order->invoice_id}}</td>
                    <td>{{$order->total_qty}}</td>
                    <td>{{$order->total_cost}}</td>
                    <td>{{$order->paymentmethod->name}}</td>
                    <td>{{$order->transaction_id}}</td>

	                <td>
	                    @php
	                        if($order->status == 0){
	                           echo  "<div class='badge badge-warning badge-shadow'>Pending</div>";
	                         }
                           if($order->status == 1){
	                           echo  "<div class='badge badge-info badge-shadow'>Processing</div>";
	                         }
                           if($order->status == 2){
                             echo  "<div class='badge badge-success badge-shadow'>Approved</div>";
                           }
                           if($order->status == 3){
                             echo  "<div class='badge badge-danger badge-shadow'>Canceled</div>";
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