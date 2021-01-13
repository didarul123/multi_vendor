@extends('layouts.admin.app')

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
                  <th>Image</th>
                  <th>Title</th>
                  <th>Slug</th>
<!--                   <th>Category</th>
                  <th>SubCategory</th>
                  <th>ProSubCategory</th> -->
                  <th>Status</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
            @php $i=1 @endphp
            @foreach($posts as $post)
                <tr>
                  	<td>{{$i++}}</td>
                    <td><img src="{{ asset($post->image) }}" alt="" style=" background: #fff;width: 130px;height: 60px;text-align: center;box-sizing: border-box;box-shadow: 6px 9px 11px -5px rgba(0,0,0,0.30);"></td>
                    <td>{{$post->title}}</td>
                    <td>{{$post->slug}}</td>
<!--                     <td>{{$post->category->name ?? ''}}</td>
                    <td>{{$post->subcategory->name ?? ''}}</td>
                    <td>{{$post->prosubcategory->name ?? ''}}</td> -->
  	                <td>
  	                    @php
  	                        if($post->status == 1){
                                echo  "<div class='badge badge-success badge-shadow'>Active</div>";
                            }else{
                                echo  "<div class='badge badge-danger badge-shadow'>Inactive</div>";
                            }
  	                    @endphp
  	                </td>
                  	<td>

                        <a href="{{URL::to('admin/post/'.$post->id.'/edit')}}" title="Edit" style="float: left; margin-left: 10px; margin-right: 10px">
                            <button type="submit" class="btn btn-primary btn-sm"><i class="fa fa-edit"></i>
                            </button>
                        </a>

                        <form action="{{URL::to('admin/post/'.$post->id)}}" method="post">
                          @csrf
                          @method('DELETE')
                          <button class="btn btn-danger btn-sm" type="submit"><i class="fa fa-trash"></i></button>
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