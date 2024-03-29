<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Service;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class ServiceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $services=Service::with('type')->latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.services.index')){
            return view('index.v1.admin.services.index',compact(['services']));
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
        $types=Type::all();
        if(View::exists('index.v1.admin.services.create')){
            return view('index.v1.admin.services.create',compact('types'));
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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'offPrice'=>'required',
            'type'=>'required'
        ]);
        try{
            $service= new Service();
            $service->title=$request->input('title');
            $service->label=$request->input('description');
            $service->price=$request->input('price');
            $service->offPrice=$request->input('offPrice');
            $service->type_id=$request->input('type');
            $service->save();
            alert()->success('موفقیت آمیز','خدمت با موفقیت اضافه شد');
            return redirect('admin/services');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ثبت رکورد');
            return redirect('/admin/services/create');
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
        if(View::exists('index.v1.admin.services.edit')){
            $service=Service::findorfail($id);
            $types=Type::all();
            if(($service)!=null){
                return view('index.v1.admin.services.edit',compact(['service','types']));
            }
            elseif(!(($service))!=null){
                alert()->error('خطا','سرویس یافت نشد');
                return redirect('/admin/services');
            }
            elseif(!(View::exists('index.v1.admin.services.edit'))){
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
            'title' => 'required',
            'label' => 'required',
            'price' => 'required',
            'offPrice'=>'required',
            'type'=>'required'
        ]);
        try{
            $service=Service::findorfail($id);
            $service->title=$request->input('title');
            $service->label=$request->input('label');
            $service->price=$request->input('price');
            $service->offPrice=$request->input('offPrice');
            $service->type_id=$request->input('type');
            $service->save();
            alert()->success('موفقیت آمیز','خدمت با موفقیت ویرایش شد');
            return redirect('admin/services');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ویرایش رکورد');
            return redirect('/admin/services');
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
            $service=Service::findorfail($id);
            if(($service)!=null){
                $service->delete();
                alert()->success('موفقیت آمیز','خدمت با موفقیت حذف شد');
                return redirect('admin/services');
            }else{
                alert()->error('خطا','سرویس موردنظر یافت نشد');
                return redirect('/admin/customer');
            }
        }
        catch(\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/services');
        }

    }
}
