<?php

namespace App\Http\Controllers\Sell;

use App\Color;
use App\Customer;
use App\Http\Controllers\Controller;
use App\Invoice;
use App\ModelProduct;
use App\Product;
use App\Setting;
use App\User;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Symfony\Component\VarDumper\Cloner\Data;
use Yajra\DataTables\DataTables;

class InvoiceController extends Controller
{
    public function index(Request $request)
    {
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
        return view('sell.list');

    }

    public function detail(Invoice $id, Request $request)
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

    public function print(Invoice $id)
    {
        $customer = Customer::where('id', $id->customer_id)->first();
        $products = Product::all();
        $colors = Color::all();
        $invoice_products = \DB::table('invoice_product')
            ->where('invoice_id', $id->id)
            ->get();

        return view('sell.print.list', compact('id', 'colors', 'customer', 'products', 'invoice_products'));

    }


    public function delete($id)
    {
        $post = Invoice::findOrFail($id);
        $post->delete();
        return response()->json($post);
    }

    public function actions($row)
    {
        $success = url('/public/icon/icons8-edit-144.png');
        $delete = url('/public/icon/icons8-delete-bin-96.png');
        $print = url('/public/icon/icons8-print-96.png');

        $btn = '<a href="' . route('admin.invoice.update', $row->id) . '">
                       <img src="' . $success . '" width="25" title="ویرایش"></a>';

        $btn = $btn . ' <a href="javascript:void(0)" data-toggle="tooltip"
                      data-id="' . $row->id . '" data-original-title="حذف"
                       class="deleteProduct">
                       <img src="' . $delete . '" width="25" title="حذف"></a>';

        $btn = $btn . '<a href="' . route('admin.invoice.print', $row->id) . '" target="_blank">
                       <img src="' . $print . '" width="25" title="چاپ پیش فاکتور"></a>';


        return $btn;

    }


}
