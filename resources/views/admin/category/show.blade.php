@extends("layouts.admin")

@section('content')


	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Show Categories</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href=" {{asset('admin.home') }} ">Dashboard</a></li>
	              <li class="breadcrumb-item active">Show Categories</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
    <!-- /.content-header -->

		  <section class="content">
		  <div class="container-fluid">
		
		 	<div class="form-group">
		 		<div class="row">
		 			<label class="col-md-1">Name</label>
		 			<div class="col-md-3"><input readonly type="text" name="name" class="form-control" value="{{$item->name}}"></div>
		 			<div class="clearfix"></div>
		 		</div>
		 	</div>
		
			 <a href='{{ route("category.edit",$item->id) }}' class='btn btn-sm btn-primary'>Edit</a>
			 <a class='btn btn-light' href='{{route("category.index")}}'>Cancel</a>

		 	</div>
		 	 <input type="hidden" name="_token" value="{{ csrf_token() }}">
		 </form>
		
		</section>

@endsection