<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Image;
use App\Models\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpFoundation\Response;

class SessionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sessions=Session::latest('created_at')->paginate(20);
        if(View::exists('index.v1.admin.session.index')){
            return view('index.v1.admin.session.index',compact(['sessions']));
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
        if(View::exists('index.v1.admin.session.create')){
            return view('index.v1.admin.session.create');

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
            'photo_id' => 'required',
            'date' => 'required'
        ]);
        try{
            $session= new Session();
            $session->title=$request->input('title');
            $session->description=$request->input('description');
            $session->date=$request->input('date');
            $session->image_id=$request->input('photo_id');
            $session->save();
            alert()->success('موفقیت آمیز','نشست با موفقیت اضافه شد');
            return redirect('admin/session');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ثبت رکورد');
            return redirect('/admin/session/create');
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
        if(View::exists('index.v1.admin.session.edit')){
            $session=session::findorfail($id);
            $image=Image::where('id',$session->image_id)->first();
            if(($session)!=null){
                return view('index.v1.admin.session.edit',compact(['session','image']));
            }
            elseif(!(($session)!=null)){
                alert()->error('خطا','نشست موردنظر یافت نشد');
                return redirect('/admin/session');
            }
            elseif(!(View::exists('index.v1.admin.session.edit'))){
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
            'date' => 'required',
            'photo_id' => 'required'
        ]);
        try{
            $session=Session::findorfail($id);
            $session->title=$request->input('title');
            $session->description=$request->input('description');
            $session->date=$request->input('date');
            $session->image_id=$request->input('photo_id');
            $session->save();
            alert()->success('موفقیت آمیز','نشست با موفقیت ویرایش شد');
            return redirect('admin/session');
        }
        catch (\Exception $m){
            alert()->warning(' خطا','خطا در ویرایش رکورد');
            return redirect('/admin/session');
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
            $session=Session::findorfail($id);
            if(($session)!=null){
                $session->delete();
                alert()->success('موفقیت آمیز','نشست با موفقیت حذف شد');
                return redirect('admin/session');
            }else{
                alert()->error('خطا','رکوردی یافت نشد');
                return redirect('/admin/session');
            }
        }
        catch (\Exception $m){
            alert()->erorr(' خطا','خطا در حذف رکورد');
            return redirect('admin/session');
        }
    }
}
