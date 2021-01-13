@extends('layouts.importer.app')

@section('content')




  <div class="content-wrapper" style="margin-left: 0 !important;">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Invoice</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Invoice</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="callout callout-info">
              <h5><i class="fas fa-info"></i> Note:</h5>
              This page has been enhanced for printing. Click the print button at the bottom of the invoice to test.
            </div>


            <!-- Main content -->
            <div class="invoice p-3 mb-3">
              <!-- title row -->
              <div class="row">
                <div class="col-12">
                  <h4>
                    <i class="fas fa-globe"></i> E-Shop.
                    <small class="float-right">Date: {{$order->created_at}}</small>
                  </h4>
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
                    <?php
                      $shop = App\Models\Shop::where('id', $order->shop_id)->first();
                      if ($shop->owner_type == 'vendor') {
                        $shop_owner = App\Models\Vendor::where('id', $shop->owner_id)->first();
                      }
                      if ($shop->owner_type == 'merchant') {
                        $shop_owner = App\Models\Merchant::where('id', $shop->owner_id)->first();
                      }
                      if ($shop->owner_type == 'importer') {
                        $shop_owner = App\Models\Importer::where('id', $shop->owner_id)->first();
                      }
                    ?>

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
                  <b>Transaction Id:</b> {{$order->transaction_id ?? ''}}
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
                      <th>Serial #</th>
                      <th>Attribute</th>
                      <th>Subtotal</th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($orderDetails as $details)
                    <tr>
                      <td>{{$details->qty}}</td>
                      <td>{{$details->product->name}}</td>
                      <td>{{$details->product_id}}</td>
                      <td>{{$details->attribute_value}}</td>
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
                    Etsy doostang zoodles disqus groupon greplin oooj voxy zoodles, weebly ning heekya handango imeem
                    plugg
                    dopplr jibjab, movity jajah plickers sifteo edmodo ifttt zimbra.
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

              <!-- this row will not appear when printing -->
              <div class="row no-print">
                <div class="col-12">
                  <a href="{{route('importer/invoice-print',[$order->id])}}"><button type="button" class="btn btn-success float-right"><i class="fas fa-print"></i>Print
                  </button></a>
                </div>
              </div>
            </div>
            <!-- /.invoice -->
          </div><!-- /.col -->
        </div><!-- /.row -->
      </div><!-- /.container-fluid -->
    </section>
    <!-- /.content -->
  </div>




@endsection