@extends('layouts.merchant.app')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">SMS</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Sl.</th>
                  <th>Name</th>
                  <th>Subject</th>
                  <th>Is Read</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @php $i=1 @endphp
            @foreach($messages as $message)
                <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$vendor->name}}</td>
                    <td>{{$message->subject}}</td>
                    <td>
                        @if($message->is_read == 0)
                            {{ "Unseen" }}
                        @else
                            {{ "Seen" }}
                        @endif

                    </td>
                  	<td>
                      <div class="row">

                        <a href="{{route('merchant/vendor-replay', $message->id)}}" title="Send Message" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-info btn-sm"><i class="fa fa-eye"></i>
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