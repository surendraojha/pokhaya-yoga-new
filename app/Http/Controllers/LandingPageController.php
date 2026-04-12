<?php

namespace App\Http\Controllers\Front;

use Illuminate\Http\Request;
use App\ContactUS;
use App\KeyPoints;
use App\LandingCourse;
use App\LandingHighlight;
use App\LandingOutcome;
use App\LandingWhyChoose;
use App\LandingAd;
//use App\Models\feeCategories
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use PDO;

class LandingPageController extends Controller
{
    //
    public function landingPage(){

        $keyPoints=KeyPoints::select('*' )
                    ->orderBy('created_at', 'DESC')
                    ->get();
        //dd($keyPoints);

        $LandingCourse=LandingCourse::select('*')

        ->first();


        $LandingHighlight=LandingHighlight::select('*')
        ->orderBy('created_at', 'DESC')
        ->get();
        //dd($LandingHighlight);

        $LandingWhyChoose=LandingWhyChoose::select('*')
        ->orderBy('created_at', 'DESC')
        ->get();


        $LandingOutcome=LandingOutcome::select('*')
                    ->orderBy('created_at', 'DESC')
                    ->get();
        $LandingAd=LandingAd::select('*')
        ->orderBy('created_at', 'DESC')
        ->get();

        return view('front.landing-page', compact(
            'LandingCourse',
            'keyPoints',
            'LandingHighlight',
            'LandingWhyChoose',
            'LandingOutcome',
            'LandingAd'
        ));
    }
    public function saveData(Request $request){
    // dd($request);
            $rules = [
            'name'=>'required',
            'email'=>'required',
            'phone'=>'required',
            'subject'=>'required',
            'remark'=>'required',


            ];


        $validator = Validator::make($request->all(),$rules);
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
        $validated = $validator->validated();

        $message= new ContactUS;

        $message->name=$request->name;
        $message->email=$request->email;
        $message->number=$request->phone;
        $message->subject=$request->subject;
        $message->message=$request->remark;
        $message->save();
        return redirect('home')->with('message','Message sent Successfully !');
    }


}


