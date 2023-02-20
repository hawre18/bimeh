<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Plane;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class PlaneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $planes=Plane::with(['type'])->latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.plane.index')){
            return view('index.v1.admin.plane.index',compact(['planes']));
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
        if(View::exists('index.v1.admin.plane.create')){
            return view('index.v1.admin.plane.create',compact(['types']));

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
            'title' => 'required',
            'description' => 'required',
            'price' => 'required',
            'charge' => 'required'
        ]);
        try{
            $plane= new Plane();
            $plane->title=$request->input('title');
            $plane->description=$request->input('description');
            $plane->price=$request->input('price');
            $plane->charge=$request->input('charge');
            $plane->image_id=$request->input('photo_id');
            $plane->save();
            alert()->success('موفقیت آمیز','طرح با موفقیت اضافه شد');
            return redirect('admin/plane');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ثبت رکورد');
            return redirect('/admin/plane/create');
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
        if(View::exists('index.v1.admin.plane.edit')){
            $plane=Plane::findorfail($id);
            $image=Image::where('id',$plane->image_id)->first();
            if(($plane)!=null){
                return view('index.v1.admin.plane.edit',compact(['plane','image']));
            }
            elseif(!(($plane)!=null)){
                alert()->error('خطا','طرح موردنظر یافت نشد');
                return redirect('/admin/plane');
            }
            elseif(!(View::exists('index.v1.admin.plane.edit'))){
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
            'description' => 'required',
            'price' => 'required',
            'charge' => 'required'
        ]);
        try{
            $plane=Plane::findorfail($id);
            $plane->title=$request->input('title');
            $plane->description=$request->input('description');
            $plane->price=$request->input('price');
            $plane->charge=$request->input('charge');
            $plane->image_id=$request->input('photo_id');
            $plane->save();
            alert()->success('موفقیت آمیز','طرح با موفقیت ویرایش شد');
            return redirect('admin/plane');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ویرایش رکورد');
            return redirect('/admin/plane');
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
            $plane=Plane::findorfail($id);
            if(($plane)!=null){
            $plane->delete();
            alert()->success('موفقیت آمیز','طرح با موفقیت حذف شد');
            return redirect('admin/plane');
            }else{
                alert()->error('خطا','رکوردی یافت نشد');
                return redirect('/admin/plane');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/plane');
        }
    }
}
