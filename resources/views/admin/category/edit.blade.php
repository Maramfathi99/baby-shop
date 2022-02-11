@extends("layouts.admin")

@section("content")

	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Edit Categories</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href=" {{asset('admin.home') }} ">Dashboard</a></li>
	              <li class="breadcrumb-item active">Edit Categories</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
    <!-- /.content-header -->

		  <section class="content">
		  <div class="container-fluid">
		 <form method="post" action="{{ asset('admin/category/'.$item->id)}}" enctype="multipart/form-data">
		 @csrf
		 @method('PUT')
		 	<div class="form-group">
		 		<div class="row">
		 			<label class="col-md-3">Name</label>
		 			<div class="col-md-6"><input type="text" name="name" class="form-control" value="{{$item->name}}"></div>
		 			<div class="clearfix"></div>
		 		</div>
		 	</div>
		 	<div class="form-group">
		 		
<button class="btn btn-primary" type="submit">Update</button>
<a class='btn btn-light' href='{{route("category.index")}}'>Cancel</a>

		 	</div>
		 	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
		 </form>
		  </div>
		</section>

@endsection