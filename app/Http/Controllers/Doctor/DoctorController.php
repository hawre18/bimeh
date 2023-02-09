<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function home()
    {
        return view('index.v1.doctor.home');
    }
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
            'tellphone' => 'required|max:12',
            'phone' => 'required|max:11',
            'address' => 'required',
            'city' => 'required',
            'province' => 'required',
            'sku' => 'required'
        ]);
        try{
            $doctor= new Doctor();
            $doctor->fname=$request->input('fname');
            $doctor->lname=$request->input('lname');
            $doctor->address=$request->input('province').$request->input('city').$request->input('address');
            $doctor->phone=$request->input('phone');
            $doctor->tellphone=$request->input('tellphone');
            $doctor->sku=$request->input('sku');

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