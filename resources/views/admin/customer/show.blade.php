@extends("layouts.admin")

@section('content')


	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Show Customer's Details</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href=" {{asset('admin.home') }} ">Dashboard</a></li>
	              <li class="breadcrumb-item active">Show Customer's Details</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
    <!-- /.content-header -->

		  <section class="content">
		  <div class="container-fluid">
          <form method='post' action='{{route("customer.index")}}'>
        @csrf
		 
		 		<div class="row">
                 <label class="col-lg-3 col-form-label">Name</label>
                        <div class="col-lg-6">
                            <input disabled id="name" value='{{ $item->user->name??"" }}' name="name" placeholder="name"
                                class="form-control" type="text">
                        </div>
                        </div>
                        <p></p>
                        <div class="row">
                        <label class="col-lg-3 col-form-label">Email</label>
                        <div class="col-lg-6">
                            <input disabled id="name" value='{{ $item->user->email??"" }}' name="email"
                                placeholder="email" class="form-control" type="text">
                        </div>
                        </div>
                        <p></p>
                        <div class="row">
                        <label class="col-lg-3 col-form-label">City</label>
                        <div class="col-lg-6">
                            <input disabled id="city" value="{{ $item->city }}" name="city" placeholder="city"
                                class="form-control" type="text">
                        </div>

                        </div>

                        <p></p>
                        <div class="row">
                        <label class="col-lg-3 col-form-label"> Adderss </label>
                        <div class="col-lg-6">
                            <input disabled id="address" value="{{ $item->address }}" name="address"
                                class="form-control" type="text">
                        </div>
                        </div>

                        <p></p>
                        <div class="row">
                        <label class="col-lg-3 col-form-label"> Mobile</label>
                        <div class="col-lg-6">
                            <input disabled id="mobile" value="{{ $item->mobile }}" name="mobile" class="form-control"
                                type="text">
                        </div>
                        </div>
                        <p></p>
                        <div class="row">
                        <label class="col-lg-3 col-form-label">Phone </label>
                        <div class="col-lg-6">
                            <input disabled id="phone" value="{{ $item->phone }}" name="phone" class="form-control"
                                type="text">
                        </div>

                        </div>
                        <p></p>
                        <div class="col-lg-6">
                            <a href="{{asset('admin/customer')}}" class="btn btn-secondary"> Cancle</a>
                        </div>

		 	</div>

		 </form>
		
		</section>

@endsection