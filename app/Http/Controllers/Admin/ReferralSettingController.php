<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReferSetting;

class ReferralSettingController extends Controller
{
    public function index(){

        $information = ReferSetting::first();
        return view('admin.setting.referral-setting',
            compact('information')
        );
    }

    public function setting(Request $request){
        $information = ReferSetting::first();

        $information->comission_type = $request->comission_type;
        $information->comission_amount = $request->comission_amount;

        $information->discount_type = $request->discount_type;
        $information->discount_amount = $request->discount_amount;

        $information->save();


        return redirect()->back()->with('msg','Referel settings updated!');




    }
}
