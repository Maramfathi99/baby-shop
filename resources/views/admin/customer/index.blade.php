@extends("layouts.admin")
@section('content')


	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Customers</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="{{route ('home.index') }}">Dashboard</a></li>
	              <li class="breadcrumb-item active">Customers</li>
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
    <div class='col-sm-1'>
        <input type="submit" class='btn btn-primary' value='Search' />
    </div>
    <p>
  	</p>
    @if($items->count()>0)
    <table class="table table-striped table-sm mt-3">
           
                <tr>
                    <th>name</th>
                    <th>email </th>
                    <th>city</th>
                    <th>address</th>
                    <th>mobile </th>
                    <th>phone</th>
                    <th width="22%">Action</th>
                </tr>
          
                @foreach($items as $item)
                <tr>
                    <td>{{$item -> user->name??""}}</td>
                    <td>{{$item -> user->email??""}}</td>
                    <td>{{ $item->city }}</td>
                    <td>{{ $item->address }}</td>
                    <td>{{ $item->mobile }}</td>
                    <td>{{ $item->phone }}</td>
                    <td>
                        <a href='{{ asset("admin/customer/".$item->id) }}' class='btn btn-sm btn-info'><i class="far fa-eye"></i></a>

                        <a href='{{ route("customer.delete",$item->id) }}' class='btn btn-danger btn-sm'
                            onclick='return confirm("Are you sure?")'><i class="fas fa-trash"></i></a>
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
