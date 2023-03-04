<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Plane;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types=Type::with('image','user')->latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.type.index')){
            return view('index.v1.admin.type.index',compact('types'));
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
        if(View::exists('index.v1.admin.type.create')){
            return view('index.v1.admin.type.create');

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
            'name' => 'required',
            'label' => 'required',
            'description' => 'required',
            'photo_id' => 'required',
        ]);
        try{
            $type= new Type();
            $type->name=$request->input('name');
            $type->label=$request->input('label');
            $type->description=$request->input('description');
            $type->image_id=$request->input('photo_id');
            $type->user_id=auth()->guard('web')->user()->id;
            $type->save();
            alert()->success('موفقیت آمیز','نوع طرح با موفقیت اضافه شد');
            return redirect('admin/type');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ثبت رکورد');
            return redirect('/admin/type/create');
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
        if(View::exists('index.v1.admin.type.edit')){
            $type=Type::findorfail($id);
            if(($type)!=null){
                return view('index.v1.admin.type.edit',compact(['type']));
            }
            elseif(!(($type)!=null)){
                alert()->error('خطا','طرح موردنظر یافت نشد');
                return redirect('/admin/type');
            }
            elseif(!(View::exists('index.v1.admin.type.edit'))){
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
            'name' => 'required',
            'label' => 'required',
            'description' => 'required',
            'photo_id' => 'required',
        ]);
        try{
            $type=Type::findorfail($id);
            $type->name=$request->input('name');
            $type->label=$request->input('label');
            $type->description=$request->input('description');
            $type->image_id=$request->input('photo_id');
            $type->user_id=auth()->guard('web')->user()->id;
            $type->save();
            alert()->success('موفقیت آمیز','نوع طرح با موفقیت ویرایش شد');
            return redirect('admin/type');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ویرایش رکورد');
            return redirect('/admin/type');
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
            $type=Type::findorfail($id);
            if(($type)!=null){
                $type->delete();
                alert()->success('موفقیت آمیز','نوع طرح با موفقیت حذف شد');
                return redirect('admin/type');
            }else{
                alert()->error('خطا','رکوردی یافت نشد');
                return redirect('/admin/type');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/type');
        }
    }

}
