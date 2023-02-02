<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use Illuminate\Http\Request;
use App\Models\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::paginate(20);
        return view('index.v1.admin.customer.index', compact(['customers']));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index.v1.admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'phone' => 'required|numeric',
            'nationalcode' => 'required|numeric'
        ]);
        try{
            $customer= new Customer();
            $customer->f_name=$request->input('fname');
            $customer->l_name=$request->input('lname');
            $customer->phone=$request->input('phone');
            $customer->nationalcode=$request->input('nationalcode');
            $customer->save();
            alert()->success('موفقیت آمیز','مشتری با موفقیت اضافه شد');
            return redirect('/admin/customer/create');
        }
        catch (\Exception $m){
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        //
    }
    public function address($id)
    {
        $customer=Customer::findorfail($id);
        $address=Address::where('customer_id',$customer->id)->get();
        return view('index.v1.admin.address.create',compact(['customer','address']));
    }
}
