@extends("layouts.admin")
@section('content')


	    <!-- Content Header (Page header) -->
	    <div class="content-header">
	      <div class="container-fluid">
	        <div class="row mb-2">
	          <div class="col-sm-6">
	            <h1 class="m-0 text-dark">Edit Products</h1>
	          </div><!-- /.col -->
	          <div class="col-sm-6">
	            <ol class="breadcrumb float-sm-right">
	              <li class="breadcrumb-item"><a href="{{route ('home.index') }}">Dashboard</a></li>
	              <li class="breadcrumb-item active">Edit Product</li>
	            </ol>
	          </div><!-- /.col -->
	        </div><!-- /.row -->
	      </div><!-- /.container-fluid -->
	    </div>
    <!-- /.content-header -->

		  <section class="content">
		  <div class="container-fluid">
          <form method="post"  enctype='multipart/form-data' action="{{ asset('admin/product/'.$product->id)}}">
		 @csrf
		 @method('put')
		 	<div class="form-group">
		 		<div class="row">
                 <label class="col-lg-3 col-form-label"> Product Name </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" name="title"
                                value='{{ old("title",$product->title) }}'>
                        </div>
                    </div>
</div>
		 	<div class="form-group">
		 		<div class="row">
		 		<label class="col-lg-3 col-form-label">Category </label>
                        <select class='form-control col-lg-6' name='category_id' id='category_id'>
                            <option value=''>Choose Category</option>
                            @foreach($categories as $category)
                            <option {{old('category_id',$product->category_id)==$category->id?'selected':''}}
                                value='{{$category->id}}'>{{$category->name}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

		 	<div class="form-group">
		 		<div class="row">
		 		    <label class="col-lg-3 col-form-label" for="details">Details </label>
                        <textarea class="form-control col-lg-6" id="details" name="details"
                            rows="3">{{ old("details",$product->details) }}</textarea>
		 		</div>
		 	</div>

             
		 	<div class="form-group">
		 		<div class="row">
                 <label class="col-lg-3 col-form-label">Regular price  </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input" 
                                name="regular_price" value='{{ old("regular_price",$product->regular_price) }}'>
                        </div>
                 </div>
                 </div>

            
                 <div class="form-group">
		 		<div class="row">
                 
                 <label class="col-lg-3 col-form-label"> Sale price </label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                name="sale_price" value='{{ old("sale_price",$product->sale_price) }}'>
                        </div>

                 </div>
                 </div>
                             
		 	<div class="form-group">
		 		<div class="row">
                 <label class="col-lg-3 col-form-label"> Quantity</label>
                        <div class="col-lg-6">
                            <input type="text" class="form-control m-input"
                                 name="quantity"
                                value='{{ old("quantity",$product->quantity) }}'>
                        </div>
                 </div>
                 </div>

                 <div class="form-group">
		 		<div class="row">
                 
                 <label class=" col-lg-3 col-form-label">Status</label>
                        <div class="m-radio-inline col-lg-6">
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{old('active',$product->active)=='1'?"checked":""}} type="radio" name="active" checked=""
                                    value="1" aria-describedby="account_group-error"> Active
                                <span></span>
                            </label>
                            <label class="m-radio m-radio--solid m-radio--brand">
                                <input {{old('active',$product->active)=='0'?"checked":""}} type="radio" name="active" value="0"> 
                               InActive
                                <span></span>
                            </label>
                        </div>
                        <span class="m-form__help"></span>

                 </div>
                 </div>

		 	<div class="form-group">
		 		<div class="row">
                 <label class="col-lg-3" for="image">image </label>
             <input class="col-lg-6" type='file' name="image" id="image" />
		 	</div>
             </div>
		 	

		 	<div class="form-group">
             <div class="row">
                        <div class="col-lg-3"></div>
                        <div class="col-lg-6">
                            <button class="btn btn-primary" type="submit">Update</button>
                            <a href='{{route("product.index")}}' class="btn btn-secondary">Cancle </a>
                            
                        </div>
                    </div>
                </div>
            </div>
        </div>
     
    </form>
</div>
</section>
@endsection