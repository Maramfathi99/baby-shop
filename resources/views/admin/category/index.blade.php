@extends("layouts.admin")
@section("title","ادارة التصنيفات")
@section('content')


	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Categories</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="{{route ('home.index') }}">Dashboard</a></li>
	              <li class="breadcrumb-item active">Categories</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
    <!-- /.content-header -->
	
		  <section class="content">
		  <div class="container-fluid">
		  <form class='row mb-3'>
    <div class='col-sm-8'>
        <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control' placeholder="Enter your search ..." />
    </div>
    <div class='col-sm-1'>
        <input type="submit" class='btn btn-primary' value='Search' />
    </div>
    <div class='col-sm-3'>
	<a href="{{asset('admin/category/create')}}" class="btn btn-primary">Add New Category</a>
    </div>
</form>
		  <p>
  	</p>
	  @if($items->count()>0)
			  	<table class="table table-bordered table-striped">
			  	<tr>
			  		<th>ID</th>
					<th>Name</th>
					<th> Date </th>
					<th>Action</th>
			  	</tr>	
		@foreach($items as $item)
  			<tr>
  				<td>{{$loop->iteration}}</td>
  				<td>{{ $item->name }}</td>
  				<td>{{$item->created_at}}</td>
  				<td>

				  <a href='{{ route("category.show",$item->id) }}' class='btn btn-sm btn-info'><i class="far fa-eye"></i></a>
            <a href="{{ route('category.edit',$item->id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> 
            <a href="{{ route('category.delete',$item->id) }}" class='btn btn-danger btn-sm' onclick='return confirm("Are you sure?")'><i class="fas fa-trash"></i></a>
         
			
          </td>
  			</tr>
  		@endforeach
	    </table>
		  </div>
		  {{ $items->links() }}
@else
<div class='alert alert-info'><b>Sorry!</b> there is no results to your search</div>
@endif
		</section>

@endsection
