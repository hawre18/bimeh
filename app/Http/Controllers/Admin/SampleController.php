<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use App\Models\Doctor;
use App\Models\Sample;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SampleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $samples=Sample::with(['doctor','image','customer','service'])->latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.sample.index')){
            return view('index.v1.admin.sample.index',compact(['samples']));
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
        $customers=Customer::all();
        $doctors=Doctor::all();
        $services=Service::all();
        if(View::exists('index.v1.admin.sample.create')){
            return view('index.v1.admin.sample.create',compact(['customers','doctors','services']));

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
            'service' => 'required',
            'photo_id' => 'required',
            'doctor' => 'required',
            'customer' => 'required',
            'dateDo' => 'required',
            'description' => 'required'
        ]);
        try{
            $sample= new Sample();
            $sample->customer_id=$request->input('customer');
            $sample->doctor_id=$request->input('doctor');
            $sample->service_id=$request->input('service');
            $sample->dateDo=$request->input('dateDo');
            $sample->image_id=$request->input('photo_id');
            $sample->description=$request->input('description');
            $sample->save();
            alert()->success('موفقیت آمیز','نمونه کار با موفقیت اضافه شد');
            return redirect('admin/sample');
        }
        catch (\Exception $m){
            return $m;
            alert()->warning(' خطا','خطا در ثبت رکورد');
            return redirect('/admin/sample/create');
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
        if(View::exists('index.v1.admin.sample.edit')){
            $sample=Sample::with('image','doctor','customer','service')->findorfail($id);
            if(($sample)!=null){
                return view('index.v1.admin.sample.edit',compact(['sample']));
            }
            elseif(!(($sample)!=null)){
                alert()->error('خطا','نمونه کار موردنظر یافت نشد');
                return redirect('/admin/sample');
            }
            elseif(!(View::exists('index.v1.admin.sample.edit'))){
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
            'service' => 'required',
            'photo_id' => 'required',
            'doctor' => 'required',
            'customer' => 'required',
            'dateDo' => 'required',
            'description' => 'required'
        ]);
        try{
            $sample=َSample::findorfail($id);
            $sample->customer_id=$request->input('customer');
            $sample->doctor_id=$request->input('doctor');
            $sample->service_id=$request->input('service');
            $sample->dateDo=$request->input('dateDo');
            $sample->image_id=$request->input('photo_id');
            $sample->description=$request->input('description');
            $sample->save();
            alert()->success('موفقیت آمیز','نمونه کار با موفقیت ویرایش شد');
            return redirect('admin/sample');
        }
        catch (\Exception $m){
            return $m;
            alert()->warning(' خطا','خطا در ویرایش رکورد');
            return redirect('/admin/sample/create');
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
            $sample=Sample::findorfail($id);
            if(($sample)!=null){
                $sample->delete();
                alert()->success('موفقیت آمیز','نمونه کار با موفقیت حذف شد');
                return redirect('admin/sample');
            }else{
                alert()->error('خطا','رکوردی یافت نشد');
                return redirect('/admin/sample');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/sample');
        }
    }
}
