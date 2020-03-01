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

        $date = Jalalian::forge(date('Y/m/d'))->format('Y/m/d');

        $pm_device = PMMachine::where('device_id', 1)
            ->first();
        $Name_Device1 = Device::where('id', 1)->first();
        $device = EventsMachine::where('device_id', 1)
            ->latest('id')->first();


        $pm_device2 = PMMachine::where('device_id', 2)
            ->first();
        $Name_Device2 = Device::where('id', 2)->first();
        $device1 = EventsMachine::where('device_id', 2)
            ->latest('id')->first();


        $pm_device3 = PMMachine::where('device_id', 3)
            ->first();
        $Name_Device3 = Device::where('id', 3)->first();
        $device2 = EventsMachine::where('device_id', 3)
            ->latest('id')->first();


        $pm_device4 = PMMachine::where('device_id', 4)
            ->first();
        $Name_Device4 = Device::where('id', 4)->first();
        $device4 = EventsMachine::where('device_id', 4)
            ->latest('id')->first();

        $pm_device5 = PMMachine::where('device_id', 5)
            ->first();
        $Name_Device5 = Device::where('id', 5)->first();
        $device5 = EventsMachine::where('device_id', 5)
            ->latest('id')->first();


        $pm_device6 = PMMachine::where('device_id', 6)
            ->first();
        $Name_Device6 = Device::where('id', 6)->first();
        $device6 = EventsMachine::where('device_id', 6)
            ->latest('id')->first();


        $pm_device7 = PMMachine::where('device_id', 7)
            ->first();
        $Name_Device7 = Device::where('id', 7)->first();
        $device7 = EventsMachine::where('device_id', 7)
            ->latest('id')->first();

        $pm_device8 = PMMachine::where('device_id', 8)
            ->first();
        $Name_Device8 = Device::where('id', 8)->first();
        $device8 = EventsMachine::where('device_id', 8)
            ->latest('id')->first();

        $pm_device9 = PMMachine::where('device_id', 9)
            ->first();
        $Name_Device9 = Device::where('id', 9)->first();
        $device9 = EventsMachine::where('device_id', 9)
            ->latest('id')->first();

        $pm_device10 = PMMachine::where('device_id', 10)
            ->first();
        $Name_Device10 = Device::where('id', 10)->first();
        $device10 = EventsMachine::where('device_id', 10)
            ->latest('id')->first();


        if (!empty($Name_Device1)) {
            if (empty($pm_device) and empty($device)) {
                $Status_Device1 = 'true';
            } else {
                if (!empty($pm_device)) {
                    if ($date >= $pm_device->date and $date <= $pm_device->todate) {
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
                    if ($date >= $pm_device2->date and $date <= $pm_device2->todate) {
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
                            $Status_Device1 = 'true';
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
                    if ($date >= $pm_device3->date and $date <= $pm_device3->todate) {
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
                            $Status_Device1 = 'true';
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
                    if ($date >= $pm_device4->date and $date <= $pm_device4->todate) {
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
                    if ($date >= $pm_device5->date and $date <= $pm_device5->todate) {
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
                    if ($date >= $pm_device6->date and $date <= $pm_device6->todate) {
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
                    if ($date >= $pm_device7->date and $date <= $pm_device7->todate) {
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
                    if ($date >= $pm_device8->date and $date <= $pm_device8->todate) {
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
                    if ($date >= $pm_device9->date and $date <= $pm_device9->todate) {
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
                    if ($date >= $pm_device10->date and $date <= $pm_device10->todate) {
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


}
