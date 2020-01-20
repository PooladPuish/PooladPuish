<?php

namespace App\Http\Controllers\Customer;

use App\Customer;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Mockery\Exception;
use Response;
use Validator;
use Yajra\DataTables\DataTables;

class CustomerController extends Controller
{
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $data = Customer::get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action'])
                ->make(true);
        }
        return view('Customer.list');


    }

    public function wizard()
    {
        $states = Customer::distinct()->select('state')->groupBy('state')->get();
        $methods = Customer::distinct()->select('method')->groupBy('method')->get();

        $typeCustomers = \App\TypeCustomer::all();

        return view('Customer.wizard', compact('typeCustomers', 'methods', 'states'));

    }

    public function update(Customer $id)
    {
        $states = Customer::distinct()->select('state')->groupBy('state')->get();
        $methods = Customer::distinct()->select('method')->groupBy('method')->get();
        $typeCustomers = \App\TypeCustomer::all();
        if ($id->type == 1) {
            $customer_company = \DB::table('customer_company')
                ->where('customer_id', $id->id)
                ->first();
            $company_personal = \DB::table('company_personal')
                ->where('customer_id', $id->id)
                ->get();
            return view('Customer.update',
                compact('id', 'customer_company', 'states', 'methods', 'company_personal', 'typeCustomers'));
        } else

            $customer_personal = \DB::table('customer_personal')
                ->where('customer_id', $id->id)
                ->first();
        return view('Customer.update',
            compact('id', 'customer_personal', 'states', 'methods', 'typeCustomers'));


    }

    public function store(Request $request)
    {

        $types = \App\TypeCustomer::where('id', $request->type)->get();
        foreach ($types as $type)
            if ($type->type == 1) {
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer|unique:customers',
                    'name' => 'required',
                    'state' => 'required',
                    'methodd' => 'required',
                    'date' => 'required',
                    'expert' => 'required',
                    'tel_company' => 'required|integer',
                ], [
                    'code.unique' => 'مشتری با این کد در سیستم موجود میباشد',
                    'code.required' => 'لطفا کد مشتری را وارد کنید',
                    'code.integer' => 'کد مشتری باید از نوع عددی باشد',
                    'name.required' => 'نام مشتری را وارد کنید',
                    'methodd.required' => 'نحوه آشنایی مشتری را وارد کنید',
                    'state.required' => 'شهر یا استان مشتری را وارد کنید',
                    'date.required' => 'تاریخ آشنایی مشتری را وارد کنید',
                    'expert.required' => 'کارشناس را وارد کنید',
                    'tel_company.required' => 'لطفا شماره تلفن دفتر مرکزی را وارد کنید',
                    'tel_company.integer' => 'شماره تلفن دفتر مرکزی باید از نوع عددی باشذ',
                ]);
            } else
                $validator = Validator::make($request->all(), [
                    'code' => 'required|integer|unique:customers',
                    'name' => 'required',
                    'state' => 'required',
                    'methodd' => 'required',
                    'date' => 'required',
                    'expert' => 'required',
                    'phone_personel' => 'required|integer',
                ], [
                    'code.unique' => 'مشتری با این کد در سیستم موجود میباشد',
                    'code.required' => 'لطفا کد مشتری را وارد کنید',
                    'code.integer' => 'کد مشتری باید از نوع عددی باشد',
                    'name.required' => 'نام مشتری را وارد کنید',
                    'methodd.required' => 'نحوه آشنایی مشتری را وارد کنید',
                    'state.required' => 'شهر یا استان مشتری را وارد کنید',
                    'date.required' => 'تاریخ آشنایی مشتری را وارد کنید',
                    'expert.required' => 'کارشناس را وارد کنید',
                    'phone_personel.required' => 'لطفا شماره تماس مشتری را وارد کنید',
                    'phone_personel.integer' => 'شماره تلفن مشتری باید از نوع عددی باشد',
                ]);

        if ($validator->passes()) {
            $customer = \App\Customer::create(
                [
                    'code' => $request->code,
                    'name' => $request->name,
                    'type' => $request->type,
                    'state' => $request->state,
                    'method' => $request->methodd,
                    'date' => $request->date,
                    'expert' => $request->expert,
                    'description' => $request->description,
                ]);
            if ($customer) {
                if ($type->type == 1) {
                    $customer_company = \DB::table('customer_company')->insert([
                        'customer_id' => $customer->id,
                        'code_company' => $request->code_company,
                        'Established_company' => $request->Established_company,
                        'tel_company' => $request->tel_company,
                        'fax_company' => $request->fax_company,
                        'adders_company' => $request->adders_company,
                        'post_company' => $request->post_company,
                        'name_companyy' => $request->name_companyy,
                    ]);
                    if ($customer_company) {
                        try {
                            $size = count(collect($request)->get('side_company'));
                            for ($i = 0; $i <= $size; $i++) {
                                \DB::table('company_personal')->insert([
                                    'customer_id' => $customer->id,
                                    'side_company' => $request->get('side_company')[$i],
                                    'sex_company' => $request->get('sex_company')[$i],
                                    'title_company' => $request->get('title_company')[$i],
                                    'name_company' => $request->get('name_company')[$i],
                                    'phone_company' => $request->get('phone_company')[$i],
                                    'inside_company' => $request->get('inside_company')[$i],
                                    'email_company' => $request->get('email_company')[$i],
                                    'tel_company_company' => $request->get('tel_company_company')[$i],
                                ]);
                            }
                            return response()->json(['success' => 'مشخصات مشتری با موفقیت در سیستم ثبت شد']);
                        } catch (\Exception $e) {
                            return response()->json(['success' => 'مشخصات مشتری با موفقیت در سیستم ثبت شد']);
                        }
                    }
                } else
                    \DB::table('customer_personal')->insert([
                        'customer_id' => $customer->id,
                        'sex' => $request->sex_personel,
                        'date_personel' => $request->date_personel,
                        'codemeli_personel' => $request->codemeli_personel,
                        'tel_personel' => $request->tel_personel,
                        'phone_personel' => $request->phone_personel,
                        'email_personel' => $request->email_personel,
                        'adders_personel' => $request->adders_personel,
                        'text_personel' => $request->text_personel,
                        'fax_personel' => $request->fax_personel,
                    ]);
                return response()->json(['success' => 'مشخصات مشتری با موفقیت در سیستم ثبت شد']);
            }
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    public function edit(Request $request)
    {
        $types = \App\TypeCustomer::where('id', $request->type)->get();
        foreach ($types as $type)
            $checks = Customer::where('id', $request->id_customer)->get();
        foreach ($checks as $check)
            if ($check->code != $request->code) {
                if ($type->type == 1) {
                    $validator = Validator::make($request->all(), [
                        'code' => 'required|integer|unique:customers',
                        'name' => 'required',
                        'state' => 'required',
                        'methodd' => 'required',
                        'date' => 'required',
                        'expert' => 'required',
                        'tel_company' => 'required|integer',
                    ], [
                        'code.unique' => 'مشتری با این کد در سیستم موجود میباشد',
                        'code.required' => 'لطفا کد مشتری را وارد کنید',
                        'code.integer' => 'کد مشتری باید از نوع عددی باشد',
                        'name.required' => 'نام مشتری را وارد کنید',
                        'methodd.required' => 'نحوه آشنایی مشتری را وارد کنید',
                        'state.required' => 'شهر یا استان مشتری را وارد کنید',
                        'date.required' => 'تاریخ آشنایی مشتری را وارد کنید',
                        'expert.required' => 'کارشناس را وارد کنید',
                        'tel_company.required' => 'لطفا شماره تلفن دفتر مرکزی را وارد کنید',
                        'tel_company.integer' => 'شماره تلفن دفتر مرکزی باید از نوع عددی باشذ',
                    ]);
                } else
                    $validator = Validator::make($request->all(), [
                        'code' => 'required|integer|unique:customers',
                        'name' => 'required',
                        'state' => 'required',
                        'methodd' => 'required',
                        'date' => 'required',
                        'expert' => 'required',
                        'phone_personel' => 'required',
                    ], [
                        'code.unique' => 'مشتری با این کد در سیستم موجود میباشد',
                        'code.required' => 'لطفا کد مشتری را وارد کنید',
                        'code.integer' => 'کد مشتری باید از نوع عددی باشد',
                        'name.required' => 'نام مشتری را وارد کنید',
                        'methodd.required' => 'نحوه آشنایی مشتری را وارد کنید',
                        'state.required' => 'شهر یا استان مشتری را وارد کنید',
                        'date.required' => 'تاریخ آشنایی مشتری را وارد کنید',
                        'expert.required' => 'کارشناس را وارد کنید',
                        'phone_personel.required' => 'لطفا شماره تماس مشتری را وارد کنید',
                    ]);
            } else
                if ($type->type == 1) {
                    $validator = Validator::make($request->all(), [
                        'code' => 'required|integer',
                        'name' => 'required',
                        'state' => 'required',
                        'methodd' => 'required',
                        'date' => 'required',
                        'expert' => 'required',
                        'tel_company' => 'required|integer',
                    ], [
                        'code.required' => 'لطفا کد مشتری را وارد کنید',
                        'code.integer' => 'کد مشتری باید از نوع عددی باشد',
                        'name.required' => 'نام مشتری را وارد کنید',
                        'methodd.required' => 'نحوه آشنایی مشتری را وارد کنید',
                        'state.required' => 'شهر یا استان مشتری را وارد کنید',
                        'date.required' => 'تاریخ آشنایی مشتری را وارد کنید',
                        'expert.required' => 'کارشناس را وارد کنید',
                        'tel_company.required' => 'لطفا شماره تلفن دفتر مرکزی را وارد کنید',
                        'tel_company.integer' => 'شماره تلفن دفتر مرکزی باید از نوع عددی باشذ',
                    ]);
                } else
                    $validator = Validator::make($request->all(), [
                        'code' => 'required|integer',
                        'name' => 'required',
                        'state' => 'required',
                        'methodd' => 'required',
                        'date' => 'required',
                        'expert' => 'required',
                        'phone_personel' => 'required',
                    ], [
                        'code.required' => 'لطفا کد مشتری را وارد کنید',
                        'code.integer' => 'کد مشتری باید از نوع عددی باشد',
                        'name.required' => 'نام مشتری را وارد کنید',
                        'methodd.required' => 'نحوه آشنایی مشتری را وارد کنید',
                        'state.required' => 'شهر یا استان مشتری را وارد کنید',
                        'date.required' => 'تاریخ آشنایی مشتری را وارد کنید',
                        'expert.required' => 'کارشناس را وارد کنید',
                        'phone_personel.required' => 'لطفا شماره تماس مشتری را وارد کنید',
                    ]);

        if ($validator->passes()) {
            $customer = Customer::find($request->id_customer)->update(
                [
                    'code' => $request->code,
                    'name' => $request->name,
                    'type' => $request->type,
                    'state' => $request->state,
                    'method' => $request->methodd,
                    'date' => $request->date,
                    'expert' => $request->expert,
                    'description' => $request->description,
                ]);
            if ($type->type == 1) {
                \DB::table('customer_company')
                    ->where('customer_id', $request->id_customer)->update([
                        'code_company' => $request->code_company,
                        'Established_company' => $request->Established_company,
                        'tel_company' => $request->tel_company,
                        'fax_company' => $request->fax_company,
                        'adders_company' => $request->adders_company,
                        'post_company' => $request->post_company,
                        'name_companyy' => $request->name_companyy,
                    ]);
                \DB::table('company_personal')
                    ->where('customer_id', $request->id_customer)->delete();
                try {
                    $size = count(collect($request)->get('side_company'));
                    for ($i = 0; $i <= $size; $i++) {
                        \DB::table('company_personal')->insert([
                            'customer_id' => $request->id_customer,
                            'side_company' => $request->get('side_company')[$i],
                            'sex_company' => $request->get('sex_company')[$i],
                            'title_company' => $request->get('title_company')[$i],
                            'name_company' => $request->get('name_company')[$i],
                            'phone_company' => $request->get('phone_company')[$i],
                            'inside_company' => $request->get('inside_company')[$i],
                            'email_company' => $request->get('email_company')[$i],
                            'tel_company_company' => $request->get('tel_company_company')[$i],

                        ]);
                    }
                    return response()->json(['success' => 'مشخصات مشتری با موفقیت در سیستم ثبت شد']);
                } catch (\Exception $e) {
                    return response()->json(['success' => 'مشخصات مشتری با موفقیت در سیستم ثبت شد']);
                }
            } else
                \DB::table('customer_personal')
                    ->where('customer_id', $request->id_customer)->update([
                        'sex' => $request->sex_personel,
                        'date_personel' => $request->date_personel,
                        'codemeli_personel' => $request->codemeli_personel,
                        'tel_personel' => $request->tel_personel,
                        'phone_personel' => $request->phone_personel,
                        'email_personel' => $request->email_personel,
                        'adders_personel' => $request->adders_personel,
                        'text_personel' => $request->text_personel,
                        'fax_personel' => $request->fax_personel,
                    ]);
            return response()->json(['success' => 'مشخصات مشتری با موفقیت در سیستم ثبت شد']);
        }
        return Response::json(['errors' => $validator->errors()]);
    }

    public function delete($id)
    {
        $post = Customer::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }

    public function filter(Request $request)
    {
        $type = \DB::table("type_customers")
            ->where("id", $request->type)
            ->pluck("type");
        return response()->json($type);

    }

    public function view(Customer $id)
    {
        $states = Customer::distinct()->select('state')->groupBy('state')->get();
        $methods = Customer::distinct()->select('method')->groupBy('method')->get();
        $typeCustomers = \App\TypeCustomer::all();
        if ($id->type == 1) {
            $customer_company = \DB::table('customer_company')
                ->where('customer_id', $id->id)
                ->first();
            $company_personal = \DB::table('company_personal')
                ->where('customer_id', $id->id)
                ->get();
            return view('Customer.view', compact('id', 'typeCustomers'
                , 'customer_company', 'company_personal'));
        }else
            $customer_personal = \DB::table('customer_personal')
                ->where('customer_id', $id->id)
                ->first();
        return view('Customer.vieww',
            compact('id', 'customer_personal', 'states', 'methods', 'typeCustomers'));


    }

    public function actions($row)
    {
        $success = url('/public/icon/icons8-edit-144.png');
        $delete = url('/public/icon/icons8-delete-bin-96.png');
        $view = url('/public/icon/icons8-preview-pane-80.png');


        $btn = ' <a href="' . route('admin.customers.view', $row->id) . '">
                       <img src="' . $view . '" width="25" title="مشاهده"></a>';
        $btn = $btn . '<a href="' . route('admin.customers.update', $row->id) . '">
                       <img src="' . $success . '" width="25" title="ویرایش"></a>';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="حذف"
                       class="deleteProduct">
                       <img src="' . $delete . '" width="25" title="حذف"></a>';
        return $btn;

    }

}
