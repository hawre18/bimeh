<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Information;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class InformationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Information::with('image')->paginate(20);
        if(View::exists('index.v1.admin.information.index')){
            return view('index.v1.admin.information.index', compact(['informations']));
        }
        abort(Response::HTTP_NOT_FOUND);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $information=Information::count();
        if(View::exists('index.v1.admin.information.create')&&$information<1){
                return view('index.v1.admin.information.create');
        }
        else {
            $informations = Information::with(['image'])->paginate(20);
            return view('index.v1.admin.information.index', compact(['informations']));
        }
        abort(Response::HTTP_NOT_FOUND);
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
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);
        try{
            $information= new Information();
            $information->title=$request->input('title');
            $information->description=$request->input('description');
            $information->phone=$request->input('phone');
            $information->address=$request->input('address');
            $information->email=$request->input('email');
            $information->image_id=$request->input('photo_id');
            $information->save();
            alert()->success('موفقیت آمیز','اطلاعات با موفقیت اضافه شد');
            return redirect('/admin/information');
        }
        catch (\Exception $m){
            return $m;
            alert()->error('خطا','خطا در ذخیره اطلاعات');
            return redirect('/admin/information/create');
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
        if(View::exists('index.v1.admin.information.show')){
            $information=Information::with('image')->findorfail($id);
            if(($information)!=null){
                return view('index.v1.admin.information.edit',compact(['information']));
            }
            elseif(!(($information)!=null)){
                alert()->error('خطا','رکورد موردنظر یافت نشد');
                return redirect('/admin/information');
            }
            elseif(!(View::exists('index.v1.admin.information.show'))){
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
        if(View::exists('index.v1.admin.information.edit')){
            $information=Information::findorfail($id);
            $image=Image::where('id',$information->image_id)->first();
            if(($information)!=null){
                return view('index.v1.admin.information.edit',compact(['information','image']));
            }
            elseif(!(($information)!=null)){
                alert()->error('خطا','رکورد موردنظر یافت نشد');
                return redirect('/admin/information');
            }
            elseif(!(View::exists('index.v1.admin.information.edit'))){
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
            'title' => 'required|min:3',
            'description' => 'required|min:3',
            'phone' => 'required|numeric',
            'address' => 'required'
        ]);
        try{
            $information=Information::findorfail($id);
            $information->title=$request->input('title');
            $information->description=$request->input('description');
            $information->phone=$request->input('phone');
            $information->address=$request->input('address');
            $information->email=$request->input('email');
            $information->image_id=$request->input('photo_id');
            $information->save();
            alert()->success('موفقیت آمیز','اطلاعات با موفقیت ویرایش شد');
            return redirect('/admin/information');
        }
        catch (\Exception $m){
            return $m;
            alert()->error('خطا','خطا در ویرایش اطلاعات');
            return redirect('/admin/information');
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
            $information=Information::findorfail($id);
            if(($information)!=null){
                $information->delete();
                alert()->success('موفقیت آمیز','رکورد با موفقیت حذف شد');
                return redirect('admin/information');
            }else{
                alert()->error('خطا','رکوردی یافت نشد');
                return redirect('/admin/information');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/information');
        }
    }
}
