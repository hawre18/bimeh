<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Address;
use App\Models\Company;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;
use Kavenegar;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;

class CustomerController extends Controller
{
    const FORMAT = "%s = %s <br/>";
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $customers=Customer::with('company')->latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.customer.index')){
            return view('index.v1.admin.customer.index', compact(['customers']));
        }else{
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(View::exists('index.v1.admin.customer.create')){
            $companies=Company::all();
        return view('index.v1.admin.customer.create',compact('companies'));
        }
        else{
                abort(Response::HTTP_NOT_FOUND);
            }
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
            $customer->company_id=$request->input('company');
            $customer->user_id=auth()->guard('web')->user()->id;
            $customer->save();
            try {
                $sender='10000550002200';
                $mes1=$customer->f_name;
                $mes2='عزیز '."<br/>";
                $mes3="به جمع خانواده شفا آوا خوش آمدید";
                $message = $mes1.$mes2.$mes3;
                $receptor = $customer->phone;
                $result = Kavenegar::Send( $sender,$receptor,$message);
               // $this->format($result);

            }catch(ApiException $e){
                echo $e->errorMessage();
            }
            catch(HttpException $e){
                echo $e->errorMessage();
            }
            alert()->success('موفقیت آمیز','مشتری با موفقیت اضافه شد');
            return redirect('/admin/customer');
        }
        catch (\Exception $m){
            return $m;
            alert()->error('خطا','خطا در ذخیره کاربر');
            return redirect('/admin/customer/create');
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
        if(View::exists('index.v1.admin.customer.show')){
            $customer=Customer::with('company')->findorfail($id);
            if(($customer)!=null){
                $addresses=Address::where('customer_id',$customer->id)->get();
                return view('index.v1.admin.customer.show',compact(['customer','addresses']));
            }
            elseif(($customer)==null){
                alert()->error('خطا','کاربری یافت نشد');
                return redirect('/admin/customer');
            }
            elseif(!(View::exists('index.v1.admin.customer.show'))){
                abort(Response::HTTP_NOT_FOUND);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if(View::exists('index.v1.admin.customer.edit')){
            $companies=Company::all();
            $customer=Customer::findorfail($id);
            if(($customer)!=null){
                return view('index.v1.admin.customer.edit',compact(['customer','companies']));
            }
            elseif(($customer)==null){
                alert()->error('خطا','کاربری یافت نشد');
                return redirect('/admin/customer');
            }
            elseif(!(View::exists('index.v1.admin.customer.edit'))){
                abort(Response::HTTP_NOT_FOUND);
            }
        }
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
        $this->validate(request(), [
            'fname' => 'required|min:3',
            'lname' => 'required|min:3',
            'phone' => 'required|numeric',
            'nationalcode' => 'required|numeric'
        ]);
        try{
            $customer=Customer::findorfail($id);
            $customer->f_name=$request->input('fname');
            $customer->l_name=$request->input('lname');
            $customer->phone=$request->input('phone');
            $customer->nationalcode=$request->input('nationalcode');
            $customer->user_id=auth()->guard('web')->user()->id;
            $customer->save();
            alert()->success('موفقیت آمیز','مشتری با موفقیت ویرایش شد');
            return redirect('/admin/customer');
        }
        catch (\Exception $m){
            alert()->error('خطا','خطا در ویرایش کاربر');
            return view('index.v1.admin.customer.edit',compact(['customer']));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $customer=Customer::findorfail($id);
            if(($customer)!=null){
                $customer->delete();
                alert()->success('موفقیت آمیز','مشتری با موفقیت حذف شد');
                return redirect('/admin/customer');
            }else{
                alert()->success('خطا','کاربری یافت نشد');
                return redirect('/admin/customer');
            }
        }
        catch(\Exception $m){
            alert()->success('خطا','مشکلی در انجام عملیات وجود دارد');
            return redirect('/admin/customer');
        }
    }
    public function address($customerId)
    {
        $customer=Customer::findorfail($customerId);
        $addresses=Address::where('customer_id',$customerId)->get();
        return view('index.v1.admin.address.create',compact(['customer','addresses']));
    }
}
