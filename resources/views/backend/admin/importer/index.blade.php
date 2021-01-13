@extends('layouts.admin.app')

@section('content')

    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Manage Importer</h3>
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
            @foreach($importers as $importer)
                <tr>
                  	<td>{{$i++}}</td>
                    <td>{{$importer->name}}</td>
                    <td>{{$importer->email}}</td>
                    <td>{{$importer->phone}}</td>
                    <td>{{$importer->company}}</td>
                    <td>{{$importer->address}}</td>
	                <td>
	                    @php
	                        if($importer->status == 1){
	                                echo  "<div class='badge badge-success badge-shadow'>Active</div>";
	                            }else{
	                                echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
	                            }
	                    @endphp
                      
	                </td>
                  	<td>
                      <div class="row">
                        <?php  if($importer->status == 1){ ?>
                        <a href="{{route('admin/inactive-importer',[$importer->id])}}"
                           class="btn btn-success btn-sm" title="Inactive"  style="float: left;margin-right: 10px;"><i
                                    class="fa fa-arrow-down"></i></a>
                        <?php }else{ ?>
                        <a href="{{route('admin/active-importer',[$importer->id])}}"
                           class="btn btn-warning btn-sm" title="Active"  style="float: left;margin-right: 10px;"><i
                                    class="fa fa-arrow-up"></i></a>
                        <?php } ?>                        <a href="{{URL::to('admin/importer/'.$importer->id)}}" title="Edit" style="float: left;margin-right: 10px;">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i>
                            </button>
                        </a>

                        <form action="{{URL::to('admin/importer/'.$importer->id)}}" method="post">
                        	@csrf
                        	@method('DELETE')
                        	<button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
                        </form>
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