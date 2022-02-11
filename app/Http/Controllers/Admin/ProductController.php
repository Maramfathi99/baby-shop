<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\product\CreateProRequest;
use App\Http\Requests\product\EditProRequest;
use App\Models\Category;
use App\Models\Product;
use Session;
use DB;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $category = $request->category;
        $active = $request->active;

        $query = product::whereRaw('true');
        
        if($active!=''){
            $query->where('active',$active);
        }

        if($category){
            $query->where('category_id',$category);
        }
        
        if($q){
            $query->whereRaw('(title like ? )',["%$q%"]);
        }

        
        $products = $query->paginate(8)
        ->appends([
            'q'     =>$q,
            'category'=>$category,
            'active'=>$active
        ]);

        $categories = category::all();
        return view("admin.product.index",compact('products','categories')); 
        
       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $products = product::all();
        $categories = category::all();
        return view("admin.product.create",compact('products','categories'));
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CreateProRequest $request)
    {
        $requestData = $request->all();
        if($request->image){
        $fileName = $request->image->store("public/assets/img"); 
        $imageName = $request->image->hashName();
        $requestData['image'] = $imageName;
        }
        product::create($requestData);
        Session::flash("msg","s: Added Successfully");
        return redirect(route("product.index"));    
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $product = product::find($id);
        if(!$product){
            session()->flash("msg","w:Invalid Id");
            return redirect(route("products.index"));
        }
        $category = DB::table("categories")->find($product->category_id)->name??'no-category';
        return view("admin.product.show",compact('product','category'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $product = product::find($id);
        if(!$product){
            session()->flash("msg","e:Invalid Id");
            return redirect(route("product.index"));
        }
        
        $categories = category::all();
        return view("admin.product.edit",compact('product','categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(EditProRequest $request, $id)
    {
        $productDB = product::find($id);
    
        if($request['image']){            
            $requestData = $request->all();
            $fileName = $request->image->store("public/assets/img");
            $imageName = $request->image->hashName();
            $requestData['image'] = $imageName;            
            $productDB->update($requestData);
        }
        else{
            
            product::where('id', $id)->update(array('title' => $request['title'],
                                                     'quantity'=> $request['quantity'],
                                                     'category_id'=> $request['category_id'],
                                                     'regular_price'=> $request['regular_price'],
                                                     'sale_price'=> $request['sale_price'],
                                                     'details'=> $request['details'],
                                                     'active'=> $request['active']
                                                    ));
        }
        
        
        session()->flash("msg","s:Updated Successfully");
        return redirect(route("product.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table("products")->where("id",$id)->delete();
        session()->flash("msg","w: Deleted Successfully");
        return redirect(route("product.index"));
    }
}
