<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Address;
use App\Models\Province;
use App\Models\City;
use App\Models\Customer;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;


class AddressController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $addresses=Address::with('customer','province','city')->paginate(20);
        if(View::exists('index.v1.admin.address.index')){
        return view('index.v1.admin.address.index',compact(['addresses']));
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $customerId)
    {

        $this->validate(request(), [
            'province' => 'required',
            'city' => 'required',
            'phone' => 'required|min:11|max:11',
            'tellphone' => 'required|min:11|max:11',
            'postcode' => 'required|min:10|max:10',
            'addrbody' => 'required'
        ]);
        try{
            $address= new Address();
            $address->province_id=$request->input('province');
            $address->city_id=$request->input('city');
            $address->phone=$request->input('phone');
            $address->tellphone=$request->input('tellphone');
            $address->postcode=$request->input('postcode');
            $address->bodyad=$request->input('addrbody');
            $address->customer_id=$customerId;
            $address->save();
            alert()->success('موفقیت آمیز','آدرس با موفقیت اضافه شد');
            return redirect()->route('create.address', [$customerId]);
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در ثبت رکورد');
            return redirect()->route('create.address', [$customerId]);
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

        try{
            $address=Address::findorfail($id);
            if(count(array($address))>0){
            $address=Address::findorfail($id);
            $address->delete();
            alert()->success('موفقیت آمیز','آدرس با موفقیت حذف شد');
            return redirect('admin/address');
            }else{
                alert()->error('خطا','آدرس یافت نشد');
                return redirect('/admin/address');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/address');
        }
    }
    public function getAllProvince()
    {
        $provinces=Province::all();
        $response=[
            'provinces'=>$provinces
        ];
        return response()->json($response,200);
    }
    public function getAllCities($provinceId)
    {
        $cities=City::where('province_id',$provinceId)->get();
        $response=[
            'cities'=>$cities
        ];
        return response()->json($response,200);
    }
}
