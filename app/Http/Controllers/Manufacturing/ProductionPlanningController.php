<?php

namespace App\Http\Controllers\Manufacturing;

use App\Device;
use App\EventsFormat;
use App\EventsMachine;
use App\Http\Controllers\Controller;
use App\PMMachine;
use Carbon\Carbon;
use DB;
use Hekmatinasser\Verta\Verta;
use Illuminate\Http\Request;
use Mockery\Exception;
use Morilog\Jalali\Jalalian;

class ProductionPlanningController extends Controller
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
        $device = EventsMachine::where('device_id', 1)
            ->latest('id')->first();

        $pm_device2 = PMMachine::where('device_id', 2)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device2 = Device::where('id', 2)->first();
        $device1 = EventsMachine::where('device_id', 2)
            ->latest('id')->first();


        $pm_device3 = PMMachine::where('device_id', 3)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device3 = Device::where('id', 3)->first();
        $device2 = EventsMachine::where('device_id', 3)
            ->latest('id')->first();


        $pm_device4 = PMMachine::where('device_id', 4)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device4 = Device::where('id', 4)->first();
        $device4 = EventsMachine::where('device_id', 4)
            ->latest('id')->first();

        $pm_device5 = PMMachine::where('device_id', 5)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device5 = Device::where('id', 5)->first();
        $device5 = EventsMachine::where('device_id', 5)
            ->latest('id')->first();


        $pm_device6 = PMMachine::where('device_id', 6)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device6 = Device::where('id', 6)->first();
        $device6 = EventsMachine::where('device_id', 6)
            ->latest('id')->first();


        $pm_device7 = PMMachine::where('device_id', 7)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device7 = Device::where('id', 7)->first();
        $device7 = EventsMachine::where('device_id', 7)
            ->latest('id')->first();

        $pm_device8 = PMMachine::where('device_id', 8)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device8 = Device::where('id', 8)->first();
        $device8 = EventsMachine::where('device_id', 8)
            ->latest('id')->first();

        $pm_device9 = PMMachine::where('device_id', 9)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();

        $Name_Device9 = Device::where('id', 9)->first();
        $device9 = EventsMachine::where('device_id', 9)
            ->latest('id')->first();

        $pm_device10 = PMMachine::where('device_id', 10)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->first();
        $Name_Device10 = Device::where('id', 10)->first();
        $device10 = EventsMachine::where('device_id', 10)
            ->latest('id')->first();


        if (!empty($Name_Device1)) {
            if (empty($pm_device1) and empty($device)) {
                $Status_Device1 = 'true';
            } else {
                if (!empty($pm_device1)) {
                    if ($date >= $pm_device1->date and $date <= $pm_device1->todate
                        and $time >= $pm_device1->time) {
                        if (!empty($device)) {
                            if ($device->status == 1) {
                                $Status_Device1 = 'true';
                            } else {
                                $Status_Device1 = 'false';
                            }
                        } else {
                            $Status_Device1 = 'false';
                        }
                    } else {
                        if (!empty($device)) {
                            if ($device->status == 1) {
                                $Status_Device1 = 'true';
                            } else {
                                $Status_Device1 = 'false';
                            }
                        } else {
                            $Status_Device1 = 'true';
                        }
                    }
                } else {
                    if (!empty($device)) {
                        if ($device->status == 1) {
                            $Status_Device1 = 'true';
                        } else {
                            $Status_Device1 = 'false';
                        }
                    } else {
                        $Status_Device1 = 'true';
                    }
                }


            }

        } else {
            $Name_Device1 = null;
            $Status_Device1 = null;

        }

        if (!empty($Name_Device2)) {
            if (empty($pm_device2) and empty($device1)) {
                $Status_Device2 = 'true';
            } else {
                if (!empty($pm_device2)) {
                    if ($date >= $pm_device2->date and $date <= $pm_device2->todate
                        and $time >= $pm_device2->time) {
                        if (!empty($device1)) {
                            if ($device1->status == 1) {
                                $Status_Device2 = 'true';
                            } else {
                                $Status_Device2 = 'false';
                            }
                        } else {
                            $Status_Device2 = 'false';
                        }
                    } else {
                        if (!empty($device1)) {
                            if ($device1->status == 1) {
                                $Status_Device2 = 'true';
                            } else {
                                $Status_Device2 = 'false';
                            }
                        } else {
                            $Status_Device2 = 'true';
                        }
                    }
                } else {
                    if (!empty($device1)) {
                        if ($device1->status == 1) {
                            $Status_Device2 = 'true';
                        } else {
                            $Status_Device2 = 'false';
                        }
                    }
                }


            }

        } else {
            $Name_Device2 = null;
            $Status_Device2 = null;
        }

        if (!empty($Name_Device3)) {
            if (empty($pm_device3) and empty($device2)) {
                $Status_Device3 = 'true';
            } else {
                if (!empty($pm_device3)) {
                    if ($date >= $pm_device3->date and $date <= $pm_device3->todate
                        and $time >= $pm_device3->time) {
                        if (!empty($device2)) {
                            if ($device2->status == 1) {
                                $Status_Device3 = 'true';
                            } else {
                                $Status_Device3 = 'false';
                            }
                        } else {
                            $Status_Device3 = 'false';
                        }
                    } else {
                        if (!empty($device2)) {
                            if ($device2->status == 1) {
                                $Status_Device3 = 'true';
                            } else {
                                $Status_Device3 = 'false';
                            }
                        } else {
                            $Status_Device3 = 'true';
                        }
                    }
                } else {
                    if (!empty($device2)) {
                        if ($device2->status == 1) {
                            $Status_Device3 = 'true';
                        } else {
                            $Status_Device3 = 'false';
                        }
                    }
                }


            }
        } else {
            $Name_Device3 = null;
            $Status_Device3 = null;
        }

        if (!empty($Name_Device4)) {
            if (empty($pm_device4) and empty($device4)) {
                $Status_Device4 = 'true';
            } else {
                if (!empty($pm_device4)) {
                    if ($date >= $pm_device4->date and $date <= $pm_device4->todate
                        and $time >= $pm_device4->time) {
                        if (!empty($device4)) {
                            if ($device4->status == 1) {
                                $Status_Device4 = 'true';
                            } else {
                                $Status_Device4 = 'false';
                            }
                        } else {
                            $Status_Device4 = 'false';
                        }
                    } else {
                        if (!empty($device4)) {
                            if ($device4->status == 1) {
                                $Status_Device4 = 'true';
                            } else {
                                $Status_Device4 = 'false';
                            }
                        } else {
                            $Status_Device4 = 'true';
                        }
                    }
                } else {
                    if (!empty($device4)) {
                        if ($device4->status == 1) {
                            $Status_Device4 = 'true';
                        } else {
                            $Status_Device4 = 'false';
                        }
                    }
                }


            }
        } else {

            $Status_Device4 = null;
            $Name_Device4 = null;
        }

        if (!empty($Name_Device5)) {
            if (empty($pm_device5) and empty($device5)) {
                $Status_Device5 = 'true';
            } else {
                if (!empty($pm_device5)) {
                    if ($date >= $pm_device5->date and $date <= $pm_device5->todate
                        and $time >= $pm_device5->time) {
                        if (!empty($device5)) {
                            if ($device5->status == 1) {
                                $Status_Device5 = 'true';
                            } else {
                                $Status_Device5 = 'false';
                            }
                        } else {
                            $Status_Device5 = 'false';
                        }
                    } else {
                        if (!empty($device5)) {
                            if ($device5->status == 1) {
                                $Status_Device5 = 'true';
                            } else {
                                $Status_Device5 = 'false';
                            }
                        } else {
                            $Status_Device5 = 'true';
                        }
                    }
                } else {
                    if (!empty($device5)) {
                        if ($device5->status == 1) {
                            $Status_Device5 = 'true';
                        } else {
                            $Status_Device5 = 'false';
                        }
                    }
                }


            }
        } else {

            $Status_Device5 = null;
            $Name_Device5 = null;
        }

        if (!empty($Name_Device6)) {
            if (empty($pm_device6) and empty($device6)) {
                $Status_Device6 = 'true';
            } else {
                if (!empty($pm_device6)) {
                    if ($date >= $pm_device6->date and $date <= $pm_device6->todate
                        and $time >= $pm_device6->time) {
                        if (!empty($device6)) {
                            if ($device6->status == 1) {
                                $Status_Device6 = 'true';
                            } else {
                                $Status_Device6 = 'false';
                            }
                        } else {
                            $Status_Device6 = 'false';
                        }
                    } else {
                        if (!empty($device6)) {
                            if ($device6->status == 1) {
                                $Status_Device6 = 'true';
                            } else {
                                $Status_Device6 = 'false';
                            }
                        } else {
                            $Status_Device6 = 'true';
                        }
                    }
                } else {
                    if (!empty($device6)) {
                        if ($device6->status == 1) {
                            $Status_Device6 = 'true';
                        } else {
                            $Status_Device6 = 'false';
                        }
                    }
                }


            }
        } else {

            $Status_Device6 = null;
            $Name_Device6 = null;
        }

        if (!empty($Name_Device7)) {
            if (empty($pm_device7) and empty($device7)) {
                $Status_Device7 = 'true';
            } else {
                if (!empty($pm_device7)) {
                    if ($date >= $pm_device7->date and $date <= $pm_device7->todate
                        and $time >= $pm_device7->time) {
                        if (!empty($device7)) {
                            if ($device7->status == 1) {
                                $Status_Device7 = 'true';
                            } else {
                                $Status_Device7 = 'false';
                            }
                        } else {
                            $Status_Device7 = 'false';
                        }
                    } else {
                        if (!empty($device7)) {
                            if ($device7->status == 1) {
                                $Status_Device7 = 'true';
                            } else {
                                $Status_Device7 = 'false';
                            }
                        } else {
                            $Status_Device7 = 'true';
                        }
                    }
                } else {
                    if (!empty($device7)) {
                        if ($device7->status == 1) {
                            $Status_Device7 = 'true';
                        } else {
                            $Status_Device7 = 'false';
                        }
                    }
                }


            }
        } else {

            $Status_Device7 = null;
            $Name_Device7 = null;
        }

        if (!empty($Name_Device8)) {
            if (empty($pm_device8) and empty($device8)) {
                $Status_Device8 = 'true';
            } else {
                if (!empty($pm_device8)) {
                    if ($date >= $pm_device8->date and $date <= $pm_device8->todate
                        and $time >= $pm_device8->time) {
                        if (!empty($device8)) {
                            if ($device8->status == 1) {
                                $Status_Device8 = 'true';
                            } else {
                                $Status_Device8 = 'false';
                            }
                        } else {
                            $Status_Device8 = 'false';
                        }
                    } else {
                        if (!empty($device8)) {
                            if ($device8->status == 1) {
                                $Status_Device8 = 'true';
                            } else {
                                $Status_Device8 = 'false';
                            }
                        } else {
                            $Status_Device8 = 'true';
                        }
                    }
                } else {
                    if (!empty($device8)) {
                        if ($device8->status == 1) {
                            $Status_Device8 = 'true';
                        } else {
                            $Status_Device8 = 'false';
                        }
                    }
                }


            }
        } else {

            $Status_Device8 = null;
            $Name_Device8 = null;
        }

        if (!empty($Name_Device9)) {
            if (empty($pm_device9) and empty($device9)) {
                $Status_Device9 = 'true';
            } else {
                if (!empty($pm_device9)) {
                    if ($date >= $pm_device9->date and $date <= $pm_device9->todate
                        and $time >= $pm_device9->time) {
                        if (!empty($device9)) {
                            if ($device9->status == 1) {
                                $Status_Device9 = 'true';
                            } else {
                                $Status_Device9 = 'false';
                            }
                        } else {
                            $Status_Device9 = 'false';
                        }
                    } else {
                        if (!empty($device9)) {
                            if ($device9->status == 1) {
                                $Status_Device9 = 'true';
                            } else {
                                $Status_Device9 = 'false';
                            }
                        } else {
                            $Status_Device9 = 'true';
                        }
                    }
                } else {
                    if (!empty($device9)) {
                        if ($device9->status == 1) {
                            $Status_Device9 = 'true';
                        } else {
                            $Status_Device9 = 'false';
                        }
                    }
                }


            }
        } else {

            $Status_Device9 = null;
            $Name_Device9 = null;
        }

        if (!empty($Name_Device10)) {
            if (empty($pm_device10) and empty($device10)) {
                $Status_Device10 = 'true';
            } else {
                if (!empty($pm_device10)) {
                    if ($date >= $pm_device10->date and $date <= $pm_device10->todate
                        and $time >= $pm_device10->time) {
                        if (!empty($device10)) {
                            if ($device10->status == 1) {
                                $Status_Device10 = 'true';
                            } else {
                                $Status_Device10 = 'false';
                            }
                        } else {
                            $Status_Device10 = 'false';
                        }
                    } else {
                        if (!empty($device10)) {
                            if ($device10->status == 1) {
                                $Status_Device10 = 'true';
                            } else {
                                $Status_Device10 = 'false';
                            }
                        } else {
                            $Status_Device10 = 'true';
                        }
                    }
                } else {
                    if (!empty($device10)) {
                        if ($device10->status == 1) {
                            $Status_Device10 = 'true';
                        } else {
                            $Status_Device10 = 'false';
                        }
                    }
                }


            }
        } else {

            $Status_Device10 = null;
            $Name_Device10 = null;
        }


        return view('productionplanning.list'
            , compact('Status_Device1', 'Name_Device1'
                , 'Status_Device2', 'Name_Device2'
                , 'Status_Device3', 'Name_Device3'
                , 'Status_Device4', 'Name_Device4'
                , 'Status_Device5', 'Name_Device5'));


    }


    public function device1($date, $time)
    {
        $ds1 = PMMachine::where('device_id', 1)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds1)) {
            if ($date >= $ds1->todate and $time >= $ds1->totime) {
                PMMachine::find($ds1->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device2($date, $time)
    {
        $ds2 = PMMachine::where('device_id', 2)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds2)) {
            if ($date >= $ds2->todate and $time >= $ds2->totime) {
                PMMachine::find($ds2->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device3($date, $time)
    {
        $ds3 = PMMachine::where('device_id', 3)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds3)) {
            if ($date >= $ds3->todate and $time >= $ds3->totime) {
                PMMachine::find($ds3->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device4($date, $time)
    {
        $ds4 = PMMachine::where('device_id', 4)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds4)) {
            if ($date >= $ds4->todate and $time >= $ds4->totime) {
                PMMachine::find($ds4->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device5($date, $time)
    {
        $ds5 = PMMachine::where('device_id', 5)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds5)) {
            if ($date >= $ds5->todate and $time >= $ds5->totime) {
                PMMachine::find($ds5->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device6($date, $time)
    {
        $ds6 = PMMachine::where('device_id', 6)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds6)) {
            if ($date >= $ds6->todate and $time >= $ds6->totime) {
                PMMachine::find($ds6->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device7($date, $time)
    {
        $ds7 = PMMachine::where('device_id', 7)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds7)) {
            if ($date >= $ds7->todate and $time >= $ds7->totime) {
                PMMachine::find($ds7->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device8($date, $time)
    {
        $ds8 = PMMachine::where('device_id', 8)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds8)) {
            if ($date >= $ds8->todate and $time >= $ds8->totime) {
                PMMachine::find($ds8->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device9($date, $time)
    {
        $ds9 = PMMachine::where('device_id', 9)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds9)) {
            if ($date >= $ds9->todate and $time >= $ds9->totime) {
                PMMachine::find($ds9->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }

    public function device10($date, $time)
    {
        $ds10 = PMMachine::where('device_id', 10)
            ->whereNull('status')
            ->where('date', '<=', $date)
            ->where('time', '<=', $time)
            ->first();
        if (!empty($ds10)) {
            if ($date >= $ds10->todate and $time >= $ds10->totime) {
                PMMachine::find($ds10->id)->update([
                    'status' => 1,
                ]);
            }
        }
    }


}
