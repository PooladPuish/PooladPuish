<?php

namespace App\Http\Controllers\Manufacturing;

use App\Color;
use App\Device;
use App\DeviceOrders;
use App\Format;
use App\Http\Controllers\Controller;
use App\Insert;
use App\PMMachine;
use App\Product;
use Carbon\Carbon;
use DB;
use Illuminate\Http\Request;
use Morilog\Jalali\Jalalian;
use Yajra\DataTables\DataTables;

class ManufacturingController extends Controller
{
    public function list()
    {

        $dt = Carbon::now()->timezone('Asia/Tehran');
        $time = Jalalian::forge($dt)->format('H:i');
        $date = Jalalian::forge(date('Y/m/d'))->format('Y/m/d');

        $this->device1($date, $time);
        $this->device2($date, $time);
        $this->device3($date, $time);
        $this->device4($date, $time);
        $this->device5($date, $time);
        $this->device6($date, $time);
        $this->device7($date, $time);
        $this->device8($date, $time);
        $this->device9($date, $time);
        $this->device10($date, $time);

        $pm_device1 = PMMachine::where('device_id', 1)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device1 = Device::where('id', 1)->first();


        $pm_device2 = PMMachine::where('device_id', 2)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device2 = Device::where('id', 2)->first();

        $pm_device3 = PMMachine::where('device_id', 3)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device3 = Device::where('id', 3)->first();


        $pm_device4 = PMMachine::where('device_id', 4)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device4 = Device::where('id', 4)->first();

        $pm_device5 = PMMachine::where('device_id', 5)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device5 = Device::where('id', 5)->first();

        $pm_device6 = PMMachine::where('device_id', 6)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device6 = Device::where('id', 6)->first();

        $pm_device7 = PMMachine::where('device_id', 7)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device7 = Device::where('id', 7)->first();

        $pm_device8 = PMMachine::where('device_id', 8)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device8 = Device::where('id', 8)->first();

        $pm_device9 = PMMachine::where('device_id', 9)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();

        $Name_Device9 = Device::where('id', 9)->first();

        $pm_device10 = PMMachine::where('device_id', 10)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device10 = Device::where('id', 10)->first();


        if (!empty($Name_Device1)) {
            if (empty($pm_device1)) {
                $Status_Device1 = 'true';
            } else {
                if (!empty($pm_device1)) {
                    if ($date >= $pm_device1->date and $date <= $pm_device1->todate
                        and $time >= $pm_device1->time) {
                        $Status_Device1 = 'false';
                    } else {
                        $Status_Device1 = 'true';
                    }
                } else {
                    $Status_Device1 = 'true';
                }
            }
        } else {
            $Name_Device1 = null;
            $Status_Device1 = null;

        }

        if (!empty($Name_Device2)) {
            if (empty($pm_device2)) {
                $Status_Device2 = 'true';
            } else {
                if (!empty($pm_device2)) {
                    if ($date >= $pm_device2->date and $date <= $pm_device2->todate
                        and $time >= $pm_device2->time) {
                        $Status_Device2 = 'false';
                    } else {
                        $Status_Device2 = 'true';
                    }
                } else {
                    $Status_Device2 = 'true';
                }
            }
        } else {
            $Name_Device2 = null;
            $Status_Device2 = null;
        }

        if (!empty($Name_Device3)) {
            if (empty($pm_device3)) {
                $Status_Device3 = 'true';
            } else {
                if (!empty($pm_device3)) {
                    if ($date >= $pm_device3->date and $date <= $pm_device3->todate
                        and $time >= $pm_device3->time) {
                        $Status_Device3 = 'false';
                    } else {
                        $Status_Device3 = 'true';
                    }
                } else {
                    $Status_Device3 = 'true';
                }
            }
        } else {
            $Name_Device3 = null;
            $Status_Device3 = null;
        }

        if (!empty($Name_Device4)) {
            if (empty($pm_device4)) {
                $Status_Device4 = 'true';
            } else {
                if (!empty($pm_device4)) {
                    if ($date >= $pm_device4->date and $date <= $pm_device4->todate
                        and $time >= $pm_device4->time) {
                        $Status_Device4 = 'false';
                    } else {
                        $Status_Device4 = 'true';
                    }
                } else {
                    $Status_Device4 = 'true';
                }
            }
        } else {
            $Status_Device4 = null;
            $Name_Device4 = null;
        }

        if (!empty($Name_Device5)) {
            if (empty($pm_device5)) {
                $Status_Device5 = 'true';
            } else {
                if (!empty($pm_device5)) {
                    if ($date >= $pm_device5->date and $date <= $pm_device5->todate
                        and $time >= $pm_device5->time) {
                        $Status_Device5 = 'false';
                    } else {
                        $Status_Device5 = 'true';
                    }
                } else {
                    $Status_Device5 = 'true';
                }
            }
        } else {
            $Status_Device5 = null;
            $Name_Device5 = null;
        }

        if (!empty($Name_Device6)) {
            if (empty($pm_device6)) {
                $Status_Device6 = 'true';
            } else {
                if (!empty($pm_device6)) {
                    if ($date >= $pm_device6->date and $date <= $pm_device6->todate
                        and $time >= $pm_device6->time) {
                        $Status_Device6 = 'false';
                    } else {
                        $Status_Device6 = 'true';
                    }
                } else {
                    $Status_Device6 = 'true';
                }
            }
        } else {

            $Status_Device6 = null;
            $Name_Device6 = null;
        }

        if (!empty($Name_Device7)) {
            if (empty($pm_device7)) {
                $Status_Device7 = 'true';
            } else {
                if (!empty($pm_device7)) {
                    if ($date >= $pm_device7->date and $date <= $pm_device7->todate
                        and $time >= $pm_device7->time) {
                        $Status_Device7 = 'false';
                    } else {
                        $Status_Device7 = 'true';
                    }
                } else {
                    $Status_Device7 = 'true';
                }
            }
        } else {
            $Status_Device7 = null;
            $Name_Device7 = null;
        }

        if (!empty($Name_Device8)) {
            if (empty($pm_device8)) {
                $Status_Device8 = 'true';
            } else {
                if (!empty($pm_device8)) {
                    if ($date >= $pm_device8->date and $date <= $pm_device8->todate
                        and $time >= $pm_device8->time) {
                        $Status_Device8 = 'false';
                    } else {
                        $Status_Device8 = 'true';
                    }
                } else {
                    $Status_Device8 = 'true';
                }
            }
        } else {

            $Status_Device8 = null;
            $Name_Device8 = null;
        }

        if (!empty($Name_Device9)) {
            if (empty($pm_device9)) {
                $Status_Device9 = 'true';
            } else {
                if (!empty($pm_device9)) {
                    if ($date >= $pm_device9->date and $date <= $pm_device9->todate
                        and $time >= $pm_device9->time) {
                        $Status_Device9 = 'false';
                    } else {
                        $Status_Device9 = 'true';
                    }
                } else {
                    $Status_Device9 = 'true';
                }
            }
        } else {
            $Status_Device9 = null;
            $Name_Device9 = null;
        }

        if (!empty($Name_Device10)) {
            if (empty($pm_device10)) {
                $Status_Device10 = 'true';
            } else {
                if (!empty($pm_device10)) {
                    if ($date >= $pm_device10->date and $date <= $pm_device10->todate
                        and $time >= $pm_device10->time) {
                        $Status_Device10 = 'false';
                    } else {
                        $Status_Device10 = 'true';
                    }
                } else {
                    $Status_Device10 = 'true';
                }
            }
        } else {

            $Status_Device10 = null;
            $Name_Device10 = null;
        }


        return view('manufacturing.list'
            , compact('Status_Device1', 'Name_Device1'
                , 'Status_Device2', 'Name_Device2'
                , 'Status_Device3', 'Name_Device3'
                , 'Status_Device4', 'Name_Device4'
                , 'Status_Device5', 'Name_Device5'
                , 'Status_Device6', 'Name_Device6'
                , 'Status_Device7', 'Name_Device7'
                , 'Status_Device8', 'Name_Device8'
                , 'Status_Device9', 'Name_Device9'
                , 'Status_Device10', 'Name_Device10'));
    }

    public function device1($date, $time)
    {
        $dss1 = PMMachine::where('device_id', 1)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss1 as $ds1) {
            if (!empty($ds1)) {
                if ($date >= $ds1->todate and $time >= $ds1->totime) {
                    PMMachine::find($ds1->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device2($date, $time)
    {
        $dss2 = PMMachine::where('device_id', 2)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss2 as $ds2) {
            if (!empty($ds2)) {
                if ($date >= $ds2->todate and $time >= $ds2->totime) {
                    PMMachine::find($ds2->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device3($date, $time)
    {
        $dss3 = PMMachine::where('device_id', 3)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss3 as $ds3) {
            if (!empty($ds3)) {
                if ($date >= $ds3->todate and $time >= $ds3->totime) {
                    PMMachine::find($ds3->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device4($date, $time)
    {
        $dss4 = PMMachine::where('device_id', 4)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss4 as $ds4) {
            if (!empty($ds4)) {
                if ($date >= $ds4->todate and $time >= $ds4->totime) {
                    PMMachine::find($ds4->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device5($date, $time)
    {
        $dss5 = PMMachine::where('device_id', 5)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss5 as $ds5) {
            if (!empty($ds5)) {
                if ($date >= $ds5->todate and $time >= $ds5->totime) {
                    PMMachine::find($ds5->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device6($date, $time)
    {
        $dss6 = PMMachine::where('device_id', 6)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss6 as $ds6) {
            if (!empty($ds6)) {
                if ($date >= $ds6->todate and $time >= $ds6->totime) {
                    PMMachine::find($ds6->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device7($date, $time)
    {
        $dss7 = PMMachine::where('device_id', 7)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss7 as $ds7) {
            if (!empty($ds7)) {
                if ($date >= $ds7->todate and $time >= $ds7->totime) {
                    PMMachine::find($ds7->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device8($date, $time)
    {
        $dss8 = PMMachine::where('device_id', 8)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss8 as $ds8) {
            if (!empty($ds8)) {
                if ($date >= $ds8->todate and $time >= $ds8->totime) {
                    PMMachine::find($ds8->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device9($date, $time)
    {
        $dss9 = PMMachine::where('device_id', 9)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss9 as $ds9) {
            if (!empty($ds9)) {
                if ($date >= $ds9->todate and $time >= $ds9->totime) {
                    PMMachine::find($ds9->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }

    public function device10($date, $time)
    {
        $dss10 = PMMachine::where('device_id', 10)
            ->whereNull('status')
            ->where('date', '>=', $date and 'todate', '<=', $date)
            ->where('time', '>=', $time and 'totime', '<=', $time)
            ->get();
        foreach ($dss10 as $ds10) {
            if (!empty($ds10)) {
                if ($date >= $ds10->todate and $time >= $ds10->totime) {
                    PMMachine::find($ds10->id)->update([
                        'status' => 1,
                    ]);
                }
            }
        }

    }


    public function deviceList1(Request $request)
    {
        if ($request->ajax()) {
            $data = DeviceOrders::where('device_id', 1)
                ->orderBy('Order', 'ASC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product', function ($row) {
                    $product = $row->productorder->product_id;
                    $name = Product::where('id', $product)->first();
                    return $name->label;
                })
                ->addColumn('color', function ($row) {
                    $color = $row->productorder->color_id;
                    $name = Color::where('id', $color)->first();
                    return $name->manufacturer . ' - ' . $name->name;
                })
                ->addColumn('number', function ($row) {
                    return $row->productorder->number;
                })
                ->addColumn('format', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    $name = Format::where('id', $format->format_id)->first();
                    return $name->name;
                })
                ->addColumn('insert', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    $name = Insert::where('id', $format->insert_id)->first();
                    if (!empty($name)) {
                        return $name->name;
                    } else {
                        return '---';
                    }
                })
                ->addColumn('size', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    return $format->size;
                })
                ->addColumn('numberproduced', function ($row) {
                    return 0;
                })
                ->rawColumns([])
                ->make(true);
        }
        return view('manufacturing.list');
    }
    public function deviceList2(Request $request)
    {
        if ($request->ajax()) {
            $data = DeviceOrders::where('device_id', 2)
                ->orderBy('Order', 'ASC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product', function ($row) {
                    $product = $row->productorder->product_id;
                    $name = Product::where('id', $product)->first();
                    return $name->label;
                })
                ->addColumn('color', function ($row) {
                    $color = $row->productorder->color_id;
                    $name = Color::where('id', $color)->first();
                    return $name->manufacturer . ' - ' . $name->name;
                })
                ->addColumn('number', function ($row) {
                    return $row->productorder->number;
                })
                ->addColumn('format', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    $name = Format::where('id', $format->format_id)->first();
                    return $name->name;
                })
                ->addColumn('insert', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    $name = Insert::where('id', $format->insert_id)->first();
                    if (!empty($name)) {
                        return $name->name;
                    } else {
                        return '---';
                    }
                })
                ->addColumn('size', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    return $format->size;
                })
                ->addColumn('numberproduced', function ($row) {
                    return 0;
                })
                ->rawColumns([])
                ->make(true);
        }
        return view('manufacturing.list');
    }
    public function deviceList3(Request $request)
    {
        if ($request->ajax()) {
            $data = DeviceOrders::where('device_id', 3)
                ->orderBy('Order', 'ASC')->get();
            return Datatables::of($data)
                ->addIndexColumn()
                ->addColumn('product', function ($row) {
                    $product = $row->productorder->product_id;
                    $name = Product::where('id', $product)->first();
                    return $name->label;
                })
                ->addColumn('color', function ($row) {
                    $color = $row->productorder->color_id;
                    $name = Color::where('id', $color)->first();
                    return $name->manufacturer . ' - ' . $name->name;
                })
                ->addColumn('number', function ($row) {
                    return $row->productorder->number;
                })
                ->addColumn('format', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    $name = Format::where('id', $format->format_id)->first();
                    return $name->name;
                })
                ->addColumn('insert', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    $name = Insert::where('id', $format->insert_id)->first();
                    if (!empty($name)) {
                        return $name->name;
                    } else {
                        return '---';
                    }
                })
                ->addColumn('size', function ($row) {
                    $product_id = $row->productorder->product_id;
                    $format = DB::table('model_products')
                        ->where('product_id', $product_id)
                        ->first();
                    return $format->size;
                })
                ->addColumn('numberproduced', function ($row) {
                    return 0;
                })
                ->rawColumns([])
                ->make(true);
        }
        return view('manufacturing.list');
    }

}
