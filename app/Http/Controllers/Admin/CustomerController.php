<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use DB;
use Session;
use App\Models\Customer;
class CustomerController extends Controller
{
 
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $q = $request->q;
        $items = Customer::where('email','like',"%$q%")
            ->orWhere('address','like',"%$q%")
            ->paginate(8)
            ->appends(['q'=>$q]);
        return view("admin.customer.index")->with('items',$items);
        
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $item = Customer::find($id);
        if(!$item){
            session()->flash("msg","w: UnAvailable");
            return redirect(route("customer.index"));
        }
       
        return view("admin.customer.show",compact('item'));
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $itemDB = Customer::find($id);
     /* if($itemDB->orders->count()>0){
            session()->flash("msg","e:لا يمكن حذف الزبون لان لديه طلبات");
            return redirect(route("customer.index"));
        }*/
        $itemDB->delete();
        session()->flash("msg","w: Deleted Successifully ");
        return redirect(route("customer.index"));
    }
}
