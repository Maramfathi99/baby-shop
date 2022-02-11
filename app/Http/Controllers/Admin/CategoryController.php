<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Category\CreateRequest;
use App\Http\Requests\Category\EditRequest;
use App\Models\Category;
use Session;

class CategoryController extends Controller
{
  
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    function index(Request $request){

 
         $q = '';
         if($request->q){
             $q = $request->q;
         }
         $items=Category::where("name","like","%$q%")
         ->paginate(4)
         ->appends(['q'=>$q]);

        return view("admin.category.index")->with("items",$items);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view("admin.category.create");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        $data=$request->all();

        Category::create($data);
        Session::flash("msg","Added Successfully");
  
         return redirect (route("category.index"));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
       $item= Category::find($id);
         if(!$item)
         {
             session()->flash("msg","Invalid ID");
             return redirect(route("category.index"));
         }
 
         return view("admin.category.show",compact('item'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $item= Category::find($id);
        if(!$item)
        {
            session()->flash("msg","Invalid ID");
            return redirect(route("category.index"));

        }
       
        return view("admin.category.edit",compact('item'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $item=Category::find($id);
        $data=$request->all();
     
        $item->update($data);

       Session::flash("msg","Updated Successfully");

        return redirect (route("category.index"));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
       
        $item= Category::find($id);
        $item->delete();
        Session::flash("msg","Deleted Successfully");
        return redirect (route("category.index"));
    }
}
