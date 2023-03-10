<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;
use Kavenegar\Exceptions\ApiException;
use Kavenegar\Exceptions\HttpException;
use Symfony\Component\HttpFoundation\Response;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companys = Company::latest('created_at')->paginate(20);
        if (View::exists('index.v1.admin.company.index')) {
            return view('index.v1.admin.company.index', compact(['companys']));
        } else {
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
        if (View::exists('index.v1.admin.company.create')) {
            return view('index.v1.admin.company.create');
        } else {
            abort(Response::HTTP_NOT_FOUND);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'uniqueCode' => 'required|min:3',
            'companyBoss' => 'required',
            'addrbody' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'tellphone' => 'required'
        ]);
        try {
            $company = new Company();
            $company->companyName = $request->input('name');
            $company->uniqueCode = $request->input('uniqueCode');
            $company->companyBoss = $request->input('companyBoss');
            $company->postcode = $request->input('postcode');
            $company->address = $request->input('addrbody');
            $company->tellphone = $request->input('tellphone');
            $company->province_id = $request->input('province');
            $company->city_id = $request->input('city');
            $company->user_id = auth()->guard('web')->user()->id;
            $company->save();

            alert()->success('موفقیت آمیز', 'شرکت با موفقیت اضافه شد');
            return redirect('/admin/company');
        } catch (\Exception $m) {
            alert()->error('خطا', 'خطا در ذخیره رکورد');
            return redirect('/admin/company/create');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        if (View::exists('index.v1.admin.company.show')) {
            $company = Company::with(['province','city','user'])->findorfail($id);
            if (($company)!=null) {
                return view('index.v1.admin.company.show', compact(['company']));
            } elseif (($company)==null) {
                alert()->error('خطا', 'رکوردی یافت نشد');
                return redirect('/admin/company');
            } elseif (!(View::exists('index.v1.admin.company.show'))) {
                abort(Response::HTTP_NOT_FOUND);
            }
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (View::exists('index.v1.admin.company.edit')) {
            $company = company::findorfail($id);
            if (($company) != null) {
                return view('index.v1.admin.company.edit', compact(['company']));
            } elseif (($company) == null) {
                alert()->error('خطا', 'رکوردی یافت نشد');
                return redirect('/admin/company');
            } elseif (!(View::exists('index.v1.admin.company.edit'))) {
                abort(Response::HTTP_NOT_FOUND);
            }
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'name' => 'required|min:3',
            'uniqueCode' => 'required|min:3',
            'companyBoss' => 'required',
            'addrbody' => 'required',
            'province' => 'required',
            'city' => 'required',
            'postcode' => 'required',
            'tellphone' => 'required'
        ]);
        try {
            $company = Company::findorfail($id);
            $company->companyName = $request->input('name');
            $company->uniqueCode = $request->input('uniqueCode');
            $company->companyBoss = $request->input('companyBoss');
            $company->postcode = $request->input('postcode');
            $company->address = $request->input('addrbody');
            $company->tellphone = $request->input('tellphone');
            $company->province_id = $request->input('province');
            $company->city_id = $request->input('city');
            $company->user_id = auth()->guard('web')->user()->id;
            $company->save();
            alert()->success('موفقیت آمیز', 'شرکت/ارگان با موفقیت ویرایش شد');
            return redirect('/admin/company');
        } catch (\Exception $m) {
            alert()->error('خطا', 'خطا در ویرایش رکورد');
            return view('index.v1.admin.company.edit', compact(['company']));
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        try {
            $company = Company::findorfail($id);
            if (($company) != null) {
                $company->delete();
                alert()->success('موفقیت آمیز', 'مشتری با موفقیت حذف شد');
                return redirect('/admin/company');
            } else {
                alert()->success('خطا', 'کاربری یافت نشد');
                return redirect('/admin/company');
            }
        } catch (\Exception $m) {
            alert()->success('خطا', 'مشکلی در انجام عملیات وجود دارد');
            return redirect('/admin/company');
        }
    }
}
