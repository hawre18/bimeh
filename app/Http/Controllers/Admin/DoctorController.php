<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\City;
use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Province;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctor::latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.doctor.index')){
        return view('index.v1.admin.doctor.index',compact(['doctors']));
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
        if(View::exists('index.v1.admin.doctor.create')){
            return view('index.v1.admin.doctor.create');
        }else{
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
            'fname' => 'required',
            'lname' => 'required',
            'tellphone' => 'required|max:12',
            'phone' => 'required|max:11',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'sku' => 'required',
            'password' => 'required',
            'email' => 'required'
        ]);

        try{
            $province=Province::where('id',$request->input('province'))->first();
            $city=City::where('id',$request->input('city'))->first();
            $doctor= new Doctor();

            $doctor->fname=$request->input('fname');
            $doctor->lname=$request->input('lname');
            $doctor->address=$province->name.' '.$city->name.' '.$request->input('address');
            $doctor->phone=$request->input('phone');
            $doctor->tellphone=$request->input('tellphone');
            $doctor->sku=$request->input('sku');
            $doctor->password=Hash::make( $request->input('password'));
            $doctor->email=$request->input('email');
            $doctor->save();
            alert()->success('موفقیت آمیز','دکتر با موفقیت اضافه شد');
            return redirect('admin/doctors/create');
        }
        catch (\Exception $m){
            return $m;
            alert()->warning(' خطا','خطا در ثبت رکورد');
            return redirect('/admin/doctors/create');
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
        $doctor=Doctor::findorfail($id);
        if(count(array($doctor)>0)){
            if(View::exists('index.v1.admin.doctor.edit')){
                return view('index.v1.admin.doctor.edit',compact(['doctor']));
            }elseif(!(View::exists('index.v1.admin.doctor.edit'))){
                abort(Response::HTTP_NOT_FOUND);
            }
            elseif(count(array($doctor)<=0)){
                alert()->error('خطا','خطا در پیداکردن رکورد');
                return redirect('admin/doctors');
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
            'fname' => 'required',
            'lname' => 'required',
            'tellphone' => 'required|max:12',
            'phone' => 'required|max:11',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'sku' => 'required',
            'email' => 'required'
        ]);

        try{
            $province=Province::where('id',$request->input('province'))->first();
            $city=City::where('id',$request->input('city'))->first();
            $doctor= new Doctor();
            $doctor->fname=$request->input('fname');
            $doctor->lname=$request->input('lname');
            $doctor->address=$province->name.' '.$city->name.' '.$request->input('address');
            $doctor->phone=$request->input('phone');
            $doctor->tellphone=$request->input('tellphone');
            $doctor->sku=$request->input('sku');
            if($request->input('password')!=null){
                $doctor->password=Hash::make( $request->input('password'));
            }
            $doctor->email=$request->input('email');
            $doctor->save();
            alert()->success('موفقیت آمیز','دکتر با موفقیت ویرایش شد');
            return redirect('admin/doctors/create');
        }
        catch (\Exception $m){
            return $m;
            alert()->warning(' خطا','خطا در ویرایش رکورد');
            return redirect('/admin/doctors/create');
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
        try{
            $doctor=Doctor::findorfail($id);
            if(count(array($doctor)>0)){
            $doctor->delete();
            alert()->success('موفقیت آمیز','دکتر با موفقیت حذف شد');
            return redirect('admin/doctors');
        }else{
                alert()->error('خطا','خطا در پیداکردن رکورد');
                return redirect('admin/doctors');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/doctors');
        }
    }
}
