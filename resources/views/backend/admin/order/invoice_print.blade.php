<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  @if($order->customer_id)
  <title>{{$order->customer->first_name." ".$order->customer->last_name}} Invoice</title>
  @else
  <title>{{$shop_owner->name}} Invoice</title>
  @endif
  <!-- Tell the browser to be responsive to screen width -->
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <!-- Bootstrap 4 -->

  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{asset('public/backend/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- Ionicons -->
  <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{asset('public/backend/dist/css/adminlte.min.css')}}">

  <!-- Google Font: Source Sans Pro -->
  <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">
</head>
<body>
<div class="wrapper">
  <!-- Main content -->
  <section class="invoice">
    <!-- title row -->
    <div class="row">
      <div class="col-12">
        <h2 class="page-header">
          <i class="fas fa-globe"></i> E-Shop.
          <small class="float-right">Date: {{$order->created_at}}</small>
        </h2>
      </div>
      <!-- /.col -->
    </div>
    <!-- info row -->
    <div class="row invoice-info">
      <div class="col-sm-4 invoice-col">
        From
        <address>
            <strong>E-Shop.</strong><br>
            795 Folsom Ave, Suite 600<br>
            San Francisco, CA 94107<br>
            Phone: (804) 123-5432<br>
            Email: info@almasaeedstudio.com
        </address>
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        To
          @if($order->customer_id)
            <address>
              <strong>{{$order->customer->first_name." ".$order->customer->last_name}}</strong><br>

              {{$order->customer->address}} <br>
              Phone: {{$order->customer->phone}}<br>
              Email: {{$order->customer->email}}
            </address>                     
          @else
             <address>
              <strong>{{$shop_owner->name}}</strong><br>

              {{$shop_owner->address}} <br>
              Phone: {{$shop_owner->phone}}<br>
              Email: {{$shop_owner->email}}
            </address>

          @endif
      </div>
      <!-- /.col -->
      <div class="col-sm-4 invoice-col">
        <b>Invoice #{{$order->invoice_id}}</b><br>
        <br>
        <b>Order ID:</b> {{$order->id}}<br>
        <b>transaction Id:</b> {{$order->transaction_id ?? ''}}
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <!-- Table row -->
    <div class="row">
      <div class="col-12 table-responsive">
        <table class="table table-striped">
          <thead>
          <tr>
	          <th>Qty</th>
	          <th>Product</th>
	          <th>Color</th>
	          <th>Size</th>
	          <th>Serial #</th>
	          <th>Subtotal</th>
          </tr>
          </thead>
          <tbody>
            @foreach($orderDetails as $details)
            <tr>
	            <td>{{$details->qty}}</td>
	            <td>{{$details->product->name}}</td>
	            <td>{{$details->color->name ?? ''}}</td>
	            <td>{{$details->size->name ?? ''}}</td>
	            <td>{{$details->product_id}}</td>
	            <td>${{$details->qty_total_amount}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->

    <div class="row">
      <!-- accepted payments column -->
      <div class="col-6">
        <p class="lead">Payment Methods:</p>
        <img src="{{asset('public/backend/dist/img/credit/visa.png')}}" alt="Visa">
        <img src="{{asset('public/backend/dist/img/credit/mastercard.png')}}" alt="Mastercard">
        <img src="{{asset('public/backend/dist/img/credit/american-express.png')}}" alt="American Express">
        <img src="{{asset('public/backend/dist/img/credit/paypal2.png')}}" alt="Paypal">

        <p class="text-muted well well-sm shadow-none" style="margin-top: 10px;">
          Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem plugg dopplr
          jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
        </p>
      </div>
      <!-- /.col -->
      <div class="col-6">
        <p class="lead"></p>

        <div class="table-responsive">
          	<table class="table">
              	<tr>
                	<th style="width:50%">Subtotal:</th>
                	<td>${{$toal_p_price}}</td>
              	</tr>
              	<tr>
                	<th>Tax (5.0%)</th>
                	<td>${{$tax}}</td>
              	</tr>
              	<tr>
                	<th>Shipping:</th>
                	<td>${{$shipping_charge}}</td>
              	</tr>
              	<tr>
                	<th>Total:</th>
                	<td>${{$total}}</td>
              	</tr>
          	</table>
        </div>
      </div>
      <!-- /.col -->
    </div>
    <!-- /.row -->
  </section>
  <!-- /.content -->
</div>
<!-- ./wrapper -->

<script type="text/javascript"> 
  window.addEventListener("load", window.print());
</script>
</body>
</html>
