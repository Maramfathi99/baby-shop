@extends("layouts.admin")
@section('content')


	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Products</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="{{route ('home.index') }}">Dashboard</a></li>
	              <li class="breadcrumb-item active">Products</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
    <!-- /.content-header -->
	
		  <section class="content">
		  <div class="container-fluid">
		  <form class='row mb-3'>
    <div class='col-sm-3'>
        <input name='q' value='{{request()->q}}' autofocus type="text" class='form-control' placeholder="Enter your search ..." />
    </div>
 
	<div class='col-2'>
                    <select name='category' id='category' class='form-control '>
                        <option value=''>Category</option>
                        @foreach($categories as $category)
                        <option {{request()->category==$category->id?"selected":""}} value="{{$category->id}}">
                            {{$category->name}}</option>
                        @endforeach
                    </select>

                </div>
                <div class='col-2'>
                    <select name='active' id='active' class='form-control'>
                        <option value=''>Status</option>
                        <option {{ request()->active=='1'?"selected":"" }} value='1'>Active</option>
                        <option {{ request()->active=='0'?"selected":"" }} value='0'>InActive</option>
                    </select>
                </div>
				<div class='col-sm-1'>
        <input type="submit" class='btn btn-primary' value='Search' />
    </div>
    <div class='col-sm-3'>
	<a href="{{asset('admin/product/create')}}" class="btn btn-primary">Add New Product</a>
    </div>
</form>
		  <p>
  	</p>
	  @if($products->count()>0)
			  	<table class="table table-bordered table-striped">
			  	<tr>
			  		<th>ID</th>
					<th>title</th>
					<th>regular_price</th>
					<th>sale_price</th>
					<th>quantity</th>
					<th>active</th>
					<th>image</th>
					<th width='15%'>Action</th>
			  	</tr>	
		@foreach($products as $product)
  			<tr>
					<td>{{$loop->iteration}}</td>
					<td>{{ $product->title }}</td>
					<td>{{ $product->regular_price==""?"$0":"{$product->regular_price}$" }}</td>
					<td>{{ $product->sale_price==""?"$0":"{$product->sale_price}$" }}</td>
					<td>{{ $product->quantity }}</td>
					<td>{{ $product->active=='1'?"active":"inactive" }}</td>
					<td><img height=50 width= 50 src='{{asset("storage/assets/img/{$product->image}")}}' alt=""></td>

					<td width="15%">
			<a href='{{ route("product.show",$product->id) }}' class='btn btn-sm btn-info'><i class="far fa-eye"></i></a>
            <a href="{{ route('product.edit',$product->id)}}" class="btn btn-info btn-sm"><i class="fas fa-edit"></i></a> 
            <a href="{{ route('product.delete',$product->id) }}" class='btn btn-danger btn-sm' onclick='return confirm("Are you sure?")'><i class="fas fa-trash"></i></a>
         
			
          </td>
  			</tr>
  		@endforeach
	    </table>
		  </div>
		  {{ $products->links() }}
@else
<div class='alert alert-info'><b>Sorry!</b> there is no results to your search</div>
@endif
		</section>

@endsection
