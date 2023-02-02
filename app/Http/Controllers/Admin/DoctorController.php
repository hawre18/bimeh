<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $doctors=Doctor::paginate(20);
        return view('index.v1.admin.doctor.index',compact(['doctors']));

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('index.v1.admin.doctor.create');
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
            'tellphone' => 'required|min:11|max:11',
            'phone' => 'required|min:11|max:11',
            'address' => 'required',
            'city_id' => 'required',
            'province_id' => 'required',
            'sku' => 'required'
        ]);
        try{
            $doctor= new Doctor();
            $doctor->fname=$request->input('fname');
            $doctor->lname=$request->input('lname');
            $doctor->address=$request->input('province_id'.'city_id'.'adrdess');
            $doctor->phone=$request->input('phone');
            $doctor->tellphone=$request->input('tellphone');
            $doctor->sku=$request->input('sky');
            $doctor->save();
            alert()->success('موفقیت آمیز','دکتر با موفقیت اضافه شد');
            return redirect('admin/doctors/create');
        }
        catch (\Exception $m){
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
    public function delete($id)
    {
        try{
            $doctor=Doctor::findorfail($id);
            $doctor->delete();
            alert()->success('موفقیت آمیز','دکتر با موفقیت حذف شد');
            return redirect('admin/doctors');
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/doctors');
        }

    }
}
