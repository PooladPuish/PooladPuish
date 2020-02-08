<?php

namespace App\Http\Controllers\Sell;

use App\Bank;
use App\Color;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\ModelProduct;
use App\Product;
use App\Role;
use App\SelectStore;
use App\Setting;
use App\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Response;
use Symfony\Component\VarDumper\Cloner\Data;
use Validator;
use View;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{


    public function index(Request $request)
    {

        $id = auth()->user()->id;
        $role = \DB::table('role_user')
            ->where('user_id',$id)->first();
        $invoices = \DB::table('invoice_customer')->get();
        $banks = Bank::where('status', 1)->get();
        $selectstores = SelectStore::where('status', 1)->get();
        $users = User::all();
        $invoicePrints = \DB::table('invoice_print')
            ->get();
        if ($role->role_id == 1){
            if ($request->ajax()) {
                $data = Invoice::orderBy('id', 'desc')->get();
                return Datatables::of($data)
                    ->addIndexColumn()
                    ->addColumn('invoiceNumber', function ($row) {
                        $invoiceNumber = $row->invoiceNumber;
                        $btn = '<a href="' . route('admin.invoice.detail', $row->id) . '">
                     ' . $invoiceNumber . '
                      </a>';
                        return $btn;
                    })
                    ->addColumn('created_at', function ($row) {
                        $created_at = Jalalian::forge($row->created_at)->format('Y/m/d');
                        return $created_at;
                    })
                    ->addColumn('status', function ($row) {
                        if ($row->state == 0) {
                            return 'در حال تکمیل';
                        } elseif ($row->state == 1) {
                            return 'تایید مشتری';
                        } elseif ($row->state == 2) {
                            return 'تایید نشده';
                        } elseif ($row->state == 3) {
                            return 'تکمیل شده';
                        }
                    })
                    ->addColumn('user_id', function ($row) {
                        return $row->user->name;
                    })
                    ->addColumn('customer_id', function ($row) {
                        return $row->customer->name;
                    })
                    ->addColumn('number_sell', function ($row) {
                        return number_format($row->number_sell) . 'عدد';
                    })
                    ->addColumn('sum_sell', function ($row) {
                        return number_format($row->sum_sell) . 'ریال';
                    })
                    ->addColumn('price_sell', function ($row) {
                        return number_format($row->price_sell) . 'ریال';
                    })
                    ->addColumn('paymentMethod', function ($row) {
                        if ($row->paymentMethod == "0") {
                            return 'نقدی';
                        } else
                            return $row->paymentMethod . 'روز ';
                    })
                    ->addColumn('invoiceType', function ($row) {
                        if ($row->invoiceType == 1) {
                            return 'رسمی';

                        } else
                            return 'غیر رسمی';
                    })
                    ->addColumn('action', function ($row) {
                        return $this->actions($row);
                    })
                    ->rawColumns(['action', 'invoiceNumber'])
                    ->make(true);
            }
            return view('sell.list', compact('invoices', 'invoicePrints', 'banks', 'users', 'selectstores'));

        }else



        if ($request->ajax()) {
            $data = Invoice::where('user_id', auth()->user()->id)->orderBy('id', 'desc')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('invoiceNumber', function ($row) {
                    $invoiceNumber = $row->invoiceNumber;
                    $btn = '<a href="' . route('admin.invoice.detail', $row->id) . '">
                     ' . $invoiceNumber . '
                      </a>';
                    return $btn;
                })
                ->addColumn('created_at', function ($row) {
                    $created_at = Jalalian::forge($row->created_at)->format('Y/m/d');
                    return $created_at;
                })
                ->addColumn('status', function ($row) {
                    if ($row->state == 0) {
                        return 'در حال تکمیل';
                    } elseif ($row->state == 1) {
                        return 'تایید مشتری';
                    } elseif ($row->state == 2) {
                        return 'تایید نشده';
                    } elseif ($row->state == 3) {
                        return 'تکمیل شده';
                    }
                })
                ->addColumn('user_id', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('customer_id', function ($row) {
                    return $row->customer->name;
                })
                ->addColumn('number_sell', function ($row) {
                    return number_format($row->number_sell) . 'عدد';
                })
                ->addColumn('sum_sell', function ($row) {
                    return number_format($row->sum_sell) . 'ریال';
                })
                ->addColumn('price_sell', function ($row) {
                    return number_format($row->price_sell) . 'ریال';
                })
                ->addColumn('paymentMethod', function ($row) {
                    if ($row->paymentMethod == "0") {
                        return 'نقدی';
                    } else
                        return $row->paymentMethod . 'روز ';
                })
                ->addColumn('invoiceType', function ($row) {
                    if ($row->invoiceType == 1) {
                        return 'رسمی';

                    } else
                        return 'غیر رسمی';
                })
                ->addColumn('action', function ($row) {
                    return $this->actions($row);
                })
                ->rawColumns(['action', 'invoiceNumber'])
                ->make(true);
        }
        return view('sell.list', compact('invoices', 'invoicePrints', 'banks', 'users', 'selectstores'));

    }

    public function trash(Request $request)
    {

        $invoices = \DB::table('invoice_customer')->get();

        if ($request->ajax()) {
            $data = Invoice::onlyTrashed()->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('invoiceNumber', function ($row) {
                    $invoiceNumber = $row->invoiceNumber;
                    $btn = '<a href="' . route('admin.invoice.detailTrash', $row->id) . '">
                     ' . $invoiceNumber . '
                      </a>';
                    return $btn;
                })
                ->addColumn('created_at', function ($row) {
                    $created_at = Jalalian::forge($row->created_at)->format('Y/m/d');
                    return $created_at;
                })
                ->addColumn('status', function ($row) {
                    if ($row->state == 0) {
                        return 'در حال تکمیل';
                    } elseif ($row->state == 1) {
                        return 'تایید مشتری';
                    } elseif ($row->state == 2) {
                        return 'تایید نشده';
                    }
                })
                ->addColumn('user_id', function ($row) {
                    return $row->user->name;
                })
                ->addColumn('customer_id', function ($row) {
                    return $row->customer->name;
                })
                ->addColumn('number_sell', function ($row) {
                    return number_format($row->number_sell) . 'عدد';
                })
                ->addColumn('sum_sell', function ($row) {
                    return number_format($row->sum_sell) . 'ریال';
                })
                ->addColumn('price_sell', function ($row) {
                    return number_format($row->price_sell) . 'ریال';
                })
                ->addColumn('paymentMethod', function ($row) {
                    if ($row->paymentMethod == "0") {
                        return 'نقدی';
                    } else
                        return $row->paymentMethod . 'روز ';
                })
                ->addColumn('invoiceType', function ($row) {
                    if ($row->invoiceType == 1) {
                        return 'رسمی';

                    } else
                        return 'غیر رسمی';
                })
                ->addColumn('action', function ($row) {
                    return $this->action($row);
                })
                ->rawColumns(['action', 'invoiceNumber'])
                ->make(true);
        }
        return view('sell.trash', compact('invoices'));

    }

    public function UpdateConfirm($id)
    {

        $product = \DB::table('invoice_customer')->where('invoice_id', $id)->first();
        return response()->json($product);
    }

    public function detail(Invoice $id)
    {


        $users = User::all();
        $customers = Customer::all();
        $colors = Color::all();
        $products = Product::all();
        $details = \DB::table('invoice_product')
            ->where('invoice_id', $id->id)
            ->get();

        $weight = \DB::table('invoice_product')
            ->where('invoice_id', $id->id)
            ->sum('weight');
        $taxAmount = \DB::table('invoice_product')
            ->where('invoice_id', $id->id)
            ->sum('taxAmount');


        return view('sell.detail', compact('details', 'id', 'colors',
            'customers', 'users', 'products', 'weight', 'taxAmount'));

    }

    public function detailTrash($id)
    {

        $invoices = Invoice::withTrashed()->find($id);

        $users = User::all();
        $customers = Customer::all();
        $colors = Color::all();
        $products = Product::all();
        $details = \DB::table('invoice_product')
            ->where('invoice_id', $invoices->id)
            ->get();

        $weight = \DB::table('invoice_product')
            ->where('invoice_id', $invoices->id)
            ->sum('weight');
        $taxAmount = \DB::table('invoice_product')
            ->where('invoice_id', $invoices->id)
            ->sum('taxAmount');


        return view('sell.detailTrash', compact('invoices', 'details', 'id', 'colors',
            'customers', 'users', 'products', 'weight', 'taxAmount'));

    }

    public function RestoreDelete($id)
    {

        $restore = Invoice::withTrashed()->find($id);
        $success = $restore->restore();
        if ($success) {
            $restore->update([
                'state' => 0,
            ]);
            \DB::table('invoice_delete')
                ->where('invoice_id', $restore->id)
                ->delete();
        }

        return response()->json(['success' => 'Product saved successfully.']);

    }

    public function wizard()
    {
        $users = User::all();
        $customers = Customer::all();
        $products = Product::all();
        $colors = Color::all();
        $setting = Setting::first();
        $modelProducts = ModelProduct::all();
        return view('sell.wizard', compact('users', 'customers',
            'products', 'colors', 'modelProducts', 'setting'));

    }

    public function update(Invoice $id)
    {

        $users = User::all();
        $customers = Customer::all();
        $products = Product::all();
        $colors = Color::all();
        $setting = Setting::first();
        $modelProducts = ModelProduct::all();
        $invoice_products = \DB::table('invoice_product')
            ->where('invoice_id', $id->id)
            ->get();
        return view('sell.update', compact('users', 'customers',
            'products', 'colors', 'modelProducts', 'setting', 'id', 'invoice_products'));

    }

    public function edit(Request $request)
    {

        $invoice = Invoice::find($request->id)->update([
            'user_id' => $request->user_id,
            'customer_id' => $request->customer_id,
            'invoiceType' => $request->InvoiceType,
            'paymentMethod' => $request->paymentMethod,
            'sum_sell' => $request->sum_selll,
            'number_sell' => $request->number_selll,
            'price_sell' => $request->price_selll,
        ]);
        if ($invoice) {
            try {
                \DB::table('invoice_product')
                    ->where('invoice_id', $request->id)
                    ->delete();
                $number = count(collect($request)->get('product'));
                for ($i = 0; $i <= $number; $i++) {
                    \DB::table('invoice_product')->insert([
                        'invoice_id' => $request->id,
                        'product_id' => $request->get('product')[$i],
                        'color_id' => $request->get('color')[$i],
                        'salesNumber' => $request->get('number')[$i],
                        'salesPrice' => $request->get('sell')[$i],
                        'sumTotal' => $request->get('Price_Sell')[$i],
                        'weight' => $request->get('Weight')[$i],
                        'taxAmount' => $request->get('Tax')[$i],
                    ]);
                }
            } catch (\Exception $e) {
            }
            return response()->json(['success' => 'مشخصات با موفقیت در سیستم ثبت شد']);


        }


    }

    public function store(Request $request)
    {

        $now_date = new Verta();
        $year = substr($now_date->year, strpos($now_date->year, '://') + 2, 6);
        $count = Invoice::where('created', date("Y/m/d"))
            ->orderBy("id", "DESC")
            ->take(1)->first();
        if ($count == null) {
            $numberCount = 1;
        } else
            $numberCount = $count->id + 1;
        $invoiceNumber = $year . $now_date->month . $now_date->day . $numberCount;
        $invoice = Invoice::create([
            'invoiceNumber' => $invoiceNumber,
            'user_id' => $request->user_id,
            'customer_id' => $request->customer_id,
            'invoiceType' => $request->InvoiceType,
            'paymentMethod' => $request->paymentMethod,
            'sum_sell' => $request->sum_selll,
            'number_sell' => $request->number_selll,
            'price_sell' => $request->price_selll,
            'created' => date("Y/m/d"),
        ]);
        if ($invoice) {
            try {
                $number = count(collect($request)->get('product'));
                for ($i = 0; $i <= $number; $i++) {
                    \DB::table('invoice_product')->insert([
                        'invoice_id' => $invoice->id,
                        'product_id' => $request->get('product')[$i],
                        'color_id' => $request->get('color')[$i],
                        'salesNumber' => $request->get('number')[$i],
                        'salesPrice' => $request->get('sell')[$i],
                        'sumTotal' => $request->get('Price_Sell')[$i],
                        'weight' => $request->get('Weight')[$i],
                        'taxAmount' => $request->get('Tax')[$i],
                    ]);
                }
            } catch (\Exception $e) {
            }
            return response()->json(['success' => 'مشخصات با موفقیت در سیستم ثبت شد']);


        }


    }

    public function CustomerValidate($id)
    {
        $customer_id = Invoice::where('id', $id)->first();
        $product = \DB::table('customer_validation_payment')->where('customer_id', $customer_id->customer_id)->first();
        return response()->json($product);

    }

    public function CustomerMany($id)
    {
        $customer_id = Invoice::where('id', $id)->first();

        $product = \DB::table('customer_history_payment')->where('customer_id', $customer_id->customer_id)->first();
        return response()->json($product);

    }

    public function print(Request $request)
    {

        \DB::table('invoice_print_date')
            ->updateOrInsert(['invoice_id' => $request->id],
                [
                    'user_id' => $request->user_id,
                    'selectstores_id' => $request->selectstores,
                    'bank_id' => $request->name_bank,
                    'date' => $request->date,
                    'description' => $request->description,
                ]);
        Invoice::where('id', $request->id)->update([
            'selectstores' => $request->selectstores,
        ]);
        $bank = Bank::where('id', $request->name_bank)->first();
        $selectstore = SelectStore::where('id', $request->selectstores)->first();
        $id = Invoice::find($request->id);
        $customer = Customer::where('id', $id->customer_id)->first();
        $products = Product::all();
        $colors = Color::all();
        $date = $request->date;
        $invoice_products = \DB::table('invoice_product')
            ->where('invoice_id', $id->id)
            ->get();

        $view = View::make('sell.print.list',
            compact('id', 'colors', 'customer',
                'products', 'invoice_products', 'bank', 'selectstore', 'date'));
        return $view->render();


    }

    public function confirm(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'date' => 'required',
            'name' => 'required',
            'HowConfirm' => 'required',
        ], [

            'date.required' => 'لطفا تاریخ را وارد کنید',
            'HowConfirm.required' => 'لطفا نحوه تایید را انتخاب کنید',
            'name.required' => 'لطفا نام تایید کننده را وارد کنید',
        ]);

        if ($validator->passes()) {
            $invoice_customer = \DB::table('invoice_customer')
                ->updateOrInsert(['invoice_id' => $request->id_in],
                    [
                        'date' => $request->date,
                        'name' => $request->name,
                        'HowConfirm' => $request->HowConfirm,
                        'file' => $request->file,
                        'description' => $request->description,
                        'created_at' => date('Y/m/d'),
                    ]);
            if ($invoice_customer) {
                Invoice::find($request->id_in)->update([
                    'state' => 1,
                ]);
            }
            return response()->json(['success' => 'Product saved successfully.']);
        }
        return Response::json(['errors' => $validator->errors()]);

    }


    public function ValidateStore(Request $request)
    {

        $id = Invoice::where('id', $request->customer_id)->first();


        $success = \DB::table('customer_validation_payment')
            ->updateOrInsert(['customer_id' => $id->customer_id],
                [
                    'Creditceiling' => $request->Creditceiling,
                    'Openceiling' => $request->Openceiling,
                    'Yearcount' => $request->Yearcount,
                    'yearAgoCount' => $request->yearAgoCount,
                    'Yearturnover' => $request->Yearturnover,
                    'lastYearturnover' => $request->lastYearturnover,
                    'user_id' => auth()->user()->id,
                    'Checkback' => $request->Checkback,
                    'Checkbackintheflow' => $request->Checkbackintheflow,
                    'accountbalance' => $request->accountbalance,
                    'Averagetimedelay' => $request->Averagetimedelay,
                    'Futurefactors' => $request->Futurefactors,
                    'Receiveddocuments' => $request->Receiveddocuments,
                    'Openaccountbalance' => $request->Openaccountbalance,
                    'paymentmethod' => $request->paymentmethod,
                    'description' => $request->description,
                    'created_at' => date('Y/m/d'),
                ]);
        if ($success) {
            Invoice::find($request->customer_id)->update([
                'state' => 3,
            ]);
        }
        return response()->json(['success' => 'Product saved successfully.']);

    }

    public function ManyStore(Request $request)
    {

        $id = Invoice::where('id', $request->many_id)->first();


        $success = \DB::table('customer_history_payment')
            ->updateOrInsert(['customer_id' => $id->customer_id],
                [
                    'user_id' => auth()->user()->id,
                    'Checkback' => $request->Checkback,
                    'Checkbackintheflow' => $request->Checkbackintheflow,
                    'accountbalance' => $request->accountbalance,
                    'Averagetimedelay' => $request->Averagetimedelay,
                    'Futurefactors' => $request->Futurefactors,
                    'Receiveddocuments' => $request->Receiveddocuments,
                    'Openaccountbalance' => $request->Openaccountbalance,
                    'paymentmethod' => $request->paymentmethod,
                    'description' => $request->description,
                    'created_at' => date('Y/m/d'),
                ]);

        return response()->json(['success' => 'Product saved successfully.']);

    }


    public function TrashAdmin($id)
    {
        $product = \DB::table('invoice_delete')
            ->where('invoice_id', $id)->first();
        return response()->json($product);

    }

    public function delete(Request $request)
    {

        $delete = \DB::table('invoice_delete')->insert([
            'invoice_id' => $request->id_delete,
            'cancellation' => $request->cancellation,
            'description' => $request->description,
            'created_at' => date('Y/d/m'),
        ]);
        if ($delete) {
            $update = Invoice::find($request->id_delete)->update([
                'state' => 2,
            ]);
            if ($update) {
                $delete_soft = Invoice::find($request->id_delete);
                $delete_soft->delete();
            }
        }
        return response()->json(['success' => 'Product saved successfully.']);
    }

    public function AdminDelete($id)
    {
        $delete = Invoice::withTrashed()->find($id);
        $delete->forceDelete();
        return response()->json(['success' => 'Product saved successfully.']);
    }

    public function ShowDetail($id)
    {
        $bank = Bank::find($id);
        return response()->json($bank);

    }

    public function PrintDetail(Invoice $id)
    {
        $customer_validation_payment = \DB::table('customer_validation_payment')
            ->where('customer_id', $id->customer_id)
            ->first();

//        $customer_history_payment = \DB::table('customer_history_payment')
//            ->where('customer_id', $id->customer_id)
//            ->first();
        $select_stores = SelectStore::all();
        $products = Product::all();
        $colors = Color::all();
        $customer = Customer::where('id', $id->customer_id)->first();
        $user = User::where('id', $id->user_id)->first();
        $users = User::where('id', $customer_validation_payment->user_id)->first();
        $invoice_products = \DB::table('invoice_product')
            ->where('invoice_id', $id->id)
            ->get();
        return view('sell.detail.list',
            compact('id', 'customer', 'user', 'invoice_products'
                , 'products', 'colors', 'customer_validation_payment', 'select_stores', 'users'));

    }

    public function price(Request $request)
    {
        $id = Product::where('id', $request->id)->first();
        return response()->json($id);

    }

    public function CheckPrint($id)
    {
        $return = \DB::table('invoice_print_date')
            ->where('invoice_id', $id)->first();
        return response()->json($return);

    }

    public function actions($row)
    {
        $success = url('/public/icon/icons8-edit-144.png');
        $delete = url('/public/icon/icons8-delete-bin-96.png');
        $print = url('/public/icon/icons8-print-96.png');
        $success_customer = url('/public/icon/icons8-good-pincode-80.png');
        $validate = url('/public/icon/icons8-id-verified-80.png');
        $many = url('/public/icon/icons8-wallet-96.png');
        $detail = url('/public/icon/icons8-more-details-96.png');


        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="تایید توسط مشتری"
                       class="SuccessCustomer">
                       <img src="' . $success_customer . '" width="20" title="تایید توسط مشتری"></a>';


        $btn = $btn . '<a href="' . route('admin.invoice.update', $row->id) . '">
                       <img src="' . $success . '" width="20" title="ویرایش پیش فاکتور"></a>';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="حذف"
                       class="deleteProduct">
                       <img src="' . $delete . '" width="20" title="لغو پیش فاکتور"></a>';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="چاپ پیش فاکتور"
                       class="Print">
                       <img src="' . $print . '" width="20" title="چاپ پیش فاکتور"></a>';


        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="اعتبار سنجی"
                       class="validate">
                       <img src="' . $validate . '" width="20" title="اعتبار سنجی"></a>';


//        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
//                      data-id="' . $row->id . '" data-original-title="سابقه پرداخت مشتری"
//                       class="many">
//                       <img src="' . $many . '" width="20" title="سابقه پرداخت مشتری"></a>';

        $btn = $btn . '<a href="' . route('admin.print.detail', $row->id) . '" target="_blank">
                       <img src="' . $detail . '" width="20" title="جزییات پیش فاکتور"></a>';


//        $btn = $btn . '<a href="' . route('admin.invoice.print', $row->id) . '" target="_blank">
//                       <img src="' . $print . '" width="20" title="چاپ پیش فاکتور"></a>';

        return $btn;

    }

    public function action($row)
    {
        $question = url('/public/icon/icons8-question-mark-64.png');
        $btn = ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="ثبت نهایی"
                       class="question">
                       <img src="' . $question . '" width="20" title="ثبت نهایی"></a>';
        return $btn;

    }


}
