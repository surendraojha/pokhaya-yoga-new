<?php

namespace App\Http\Controllers\front;

use App\Booking;
use App\Course;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\KeyPoints;
use App\LandingAd;
use App\LandingCourse;
use App\LandingHighlight;
use App\LandingOutcome;
use App\LandingWhyChoose;
use App\Blog;
use App\SeoMeta;
use App\Setting;
use App\FeeList;
use App\Testimonial;
use App\YogaClass;

class LandingPageController extends Controller
{
    public function landingPage(){

		$seoMeta = SeoMeta::where('name', 'yogaschool')->first();
        // $keyPoints=KeyPoints::select('*' )
        //             ->orderBy('created_at', 'DESC')
        //             ->get();

        $courses = YogaClass::get();

        $LandingCourse=LandingCourse::select('*')->first();

        // $LandingHighlight=LandingHighlight::select('*')
        // ->orderBy('created_at', 'DESC')
        // ->get();

        // $LandingWhyChoose=LandingWhyChoose::select('*')
        // ->orderBy('created_at', 'DESC')
        // ->get();

        // $LandingOutcome=LandingOutcome::select('*')
        //             ->orderBy('created_at', 'DESC')
        //             ->get();

        $LandingAd=LandingAd::select('*')
        ->orderBy('created_at', 'DESC')
        ->get();
		$testimonials = \App\Testimonial::all();

        $blogs=Blog::select('*')->get();
        // $testimonial=Testimonial::select('*')->get();
        // //dd($testimonial[0]->name);
        $whats_app = Setting::first();
        $feeList_200= FeeList::where('category_id',1)->get()->shuffle();
        $feeList_300=FeeList::where('category_id',2)->get()->shuffle();

        return view('front.landing-page', compact(
            'LandingCourse',
            // 'keyPoints',
            // 'LandingHighlight',
            // 'LandingWhyChoose',
            // 'LandingOutcome',
            'LandingAd',
            'testimonials',
            'courses',
            'whats_app',
            'feeList_200',
            'feeList_300',
            'blogs',
            // 'testimonial',
            'seoMeta'
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
