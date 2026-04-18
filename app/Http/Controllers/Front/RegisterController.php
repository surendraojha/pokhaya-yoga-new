<?php

namespace App\Http\Controllers\Front;

use App\Models\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\Activate;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use App\Models\SeoMeta;
use App\Mail\OrderMail;
use App\Models\Banner;
use Illuminate\Support\Facades\Validator;
use App\Helpers\Helper;



class RegisterController extends Controller
{
    //


    public function showForm()
    {

        // $seoMeta = SeoMeta::where('name', 'customer-register')->first();
        $banner = Banner::where('title', 'register-banner')->first();

        return view('front.auth.register-new', compact('banner'));

        return view('front.auth.register', compact('banner'));
    }


    public function signup(Request $request)
    {
        $validator = Validator::make(
            $request->all(),
            [
                'fullname'           => 'required|string|max:255',
                'email'              => 'required|email|unique:customers,email',
                // 'password'           => 'required|min:8',
                'gender'             => 'required|in:Male,Female,Other',
                'dob'                => 'required|date|before:today',
                'phoneNo'            => 'required|string|max:20',
                'whatsappNo'         => 'nullable|string|max:20',
                'nationality'        => 'required|string|max:100',
                'cResidence'         => 'required|string|max:500',
                'course'             => 'required|string',
                'startDate'          => 'required|date|after_or_equal:today',
                'termsCondition'     => 'required',
                // Optional fields validation
                'accommodation'      => 'nullable|string',
                'practiceTime'       => 'nullable|string',
                'yogaExperience'     => 'nullable|string',
                'purposeOfcourse'    => 'nullable|string',
                'medicalCondition'   => 'nullable|string',
                'specialRequirement' => 'nullable|string',
                'EmergencyContact'   => 'required|string',
                // 'g-recaptcha-response'=>'required'
            ]
        );

        if ($validator->fails()) {
            return redirect()->back()
                ->withErrors($validator)
                ->withInput();
        }

        // Check spam on free-text fields

        if (env('APP_ENV') === 'production') {
            $freeTextFields = ['comments', 'purposeOfcourse', 'specialRequirement'];

            $isSpam = Helper::isSpamSubmission(
                $request,
                $freeTextFields,
                ['phoneNo', 'whatsappNo'],
                'fullname',
                'email'
            );

            if ($isSpam) {
                return redirect()->back()
                    ->withErrors(['message' => 'Your registration looks like spam.'])
                    ->withInput();
            }
        }
        $data =[
            'name'               => $request->fullname,
            'email'              => strtolower($request->input('email')),
            'password'           => Hash::make($request->input('password')),
            'status'             => '1',
            'gender'             => $request->gender,
            'dob'                => $request->dob,
            'contact'            => $request->phoneNo,
            'whatsappNo'         => $request->whatsappNo,
            'nationality'        => $request->nationality,
            'address'            => $request->cResidence,
            'course'             => $request->course,
            'startDate'          => $request->startDate,
            'accommodation'      => $request->accommodation,
            'practiceTime'       => $request->practiceTime,
            'yogaExperience'     => $request->yogaExperience,
            'purposeOfcourse'    => $request->purposeOfcourse,
            'medicalCondition'   => $request->medicalCondition,
            'specialRequirement' => $request->specialRequirement,
            'EmergencyContact'   => $request->EmergencyContact,
            'comments'           => $request->comments,
            'hearUs'             => $request->hearUs,
            'reffered'           => $request->reffered,
            'termsCondition'     => $request->termsCondition,
            'coupon_code'        => $request->coupon_code
        ];

        $user = Customer::create($data);

        // Send Mail
        $email = 'info@pokharayogaschoolandretreatcenter.com';

        Mail::to($email)->send(new OrderMail($data));

        return redirect()->route('thankyou')->with('success', 'To confirm your spot, please proceed with the deposit payment of USD 200.')->with('title', 'Registration Successful');
    }

    // public function signup(Request $request)
    // {


    //     $validator = Validator::make(
    //         $request->all(),
    //         [
    //             // 'g-recaptcha-response'=>'required'
    //         ]
    //     );


    //     if ($validator->fails()) {
    //         return redirect()->back()
    //             ->withErrors($validator)
    //             ->withInput();
    //     }

    //     // Check spam on free-text fields
    //     $freeTextFields = ['comments', 'purposeOfcourse', 'specialRequirement'];

    //     $isSpam = Helper::isSpamSubmission(
    //         $request,
    //         $freeTextFields,
    //         ['phoneNo', 'whatsappNo'],
    //         'fullname',
    //         'email'
    //     );

    //     if ($isSpam) {
    //         return redirect()->back()->withErrors(['message' => 'Your registration looks like spam.'])->withInput();
    //     }


    //     $user = Customer::create([
    //         'name' => $request->fullname,
    //         'email' => strtolower($request->input('email')),
    //         'password' => Hash::make($request->input('password')),
    //         'status' => '1',
    //         'gender' => $request->gender,
    //         'dob' => $request->dob,
    //         'contact' => $request->phoneNo,
    //         'whatsappNo' => $request->whatsappNo,
    //         'nationality' => $request->nationality,
    //         'address' => $request->cResidence,
    //         'course' => $request->course,
    //         'startDate' => $request->startDate,
    //         'accommodation' => $request->accommodation,
    //         'practiceTime' => $request->practiceTime,
    //         'yogaExperience' => $request->yogaExperience,
    //         'purposeOfcourse' => $request->purposeOfcourse,
    //         'medicalCondition' => $request->medicalCondition,
    //         'specialRequirement' => $request->specialRequirement,
    //         'EmergencyContact' => $request->EmergencyContact,
    //         'comments' => $request->comments,
    //         'hearUs' => $request->hearUs,
    //         'reffered' => $request->reffered,
    //         'termsCondition' => $request->termsCondition,
    //         'coupon_code' => $request->coupon_code
    //     ]);



    //     $data = array(
    //         'name' => $request->fullname,
    //         'email' => $request->email,
    //         'gender' => $request->gender,
    //         'dob' => $request->dob,
    //         'contact' => $request->phoneNo,
    //         'whatsappNo' => $request->whatsappNo,
    //         'nationality' => $request->nationality,
    //         'address' => $request->cResidence,
    //         'course' => $request->course,
    //         'startDate' => $request->startDate,
    //         'accommodation' => $request->accommodation,
    //         'practiceTime' => $request->practiceTime,
    //         'yogaExperience' => $request->yogaExperience,
    //         'purposeOfcourse' => $request->purposeOfcourse,
    //         'medicalCondition' => $request->medicalCondition,
    //         'specialRequirement' => $request->specialRequirement,
    //         'EmergencyContact' => $request->EmergencyContact,
    //         'comments' => $request->comments,
    //         'hearUs' => $request->hearUs,
    //         'reffered' => $request->reffered,
    //         'termsCondition' => $request->termsCondition,
    //         'coupon_code' => $request->coupon_code
    //     );
    //     $email = 'info@pokharayogaschoolandretreatcenter.com';




    //     Mail::to($email)->send(new OrderMail($data));

    //     // Mail::to($user->email)->send(new Activate($user));


    //     return redirect()->route('thankyou')->with('success', 'To confirm your spot, Please Proceed deposit payment USD 200.');
    // }


    public function activate($id)
    {

        $customer = Customer::find($id);

        $customer->status = '1';

        $customer->save();

        return redirect()->route('customer.login')->with('msg', 'Your Account Activated Try login');
    }
}
