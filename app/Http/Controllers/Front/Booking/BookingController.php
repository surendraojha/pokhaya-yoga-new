<?php

namespace App\Http\Controllers\Front\Booking;

use App\Booking;
use App\Customer;
use App\FeeCategory;
use App\FeeList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\ReferSetting;
use Illuminate\Support\Str;
use Session;

class BookingController extends Controller
{

    public function __construct()
    {
        $this->middleware('customer');
    }

    // my bookings


    public function index(){
        $user = auth('customer')->user();
        $informations = Booking::select('*',

        'bookings.name as name',
        'bookings.email as email',
        'bookings.id as id','customers.name as referer',
        'bookings.status as status'
        )
            ->leftjoin('customers' ,'customers.id','=','bookings.referred_by')

            ->where('customer_id',$user->id)->paginate(10);

        return view('front.bookings.index',

            compact('informations')
        );
    }


    public function set_price($id, $numberOfAttendants)
	{
		$result = \App\FeeList::find($id);

		// referer discount type percentage

		// $result * 100/amount
		$result->share_room = $result->share_room * $numberOfAttendants;
		$result->private_room = $result->private_room * $numberOfAttendants;

		return response()->json($result);
	}

	public function discounted_price($id, $numberOfAttendants, $token, $room_type)
	{


		$result = \App\FeeList::find($id);
		$refer_setting = ReferSetting::first();
		$customer = \App\Customer::where('referral_token', $token)->first();
		// referer discount type percentage

		// $result * 100/amount
		if ($room_type == 'share') {
			$result->share_room = $result->share_room * $numberOfAttendants;
			// calculate commussion

			// if ($refer_setting->commission_type == 'percentage') {
			// 	$amount = $result->share_room * $refer_setting->comission_amount / 100;
			// 	//$discounted = $result->share_room - $amount;
			// } else {
			// 	$amount =  $refer_setting->comission_amount;
			// }

			// calculate disount

			if ($refer_setting->discount_type == 'percentage') {
				$discount_amount = $result->share_room * $refer_setting->discount_amount / 100;
				//$discounted = $result->share_room - $amount;
			} else {
				$discount_amount =  $refer_setting->discount_amount *$numberOfAttendants;
			}
		} else {
			$result->private_room = $result->private_room * $numberOfAttendants;

			// if ($refer_setting->commission_type == 'percentage') {
			// 	$amount = $result->private_room * $refer_setting->comission_amount / 100;
			// } else {
			// 	$amount =  $refer_setting->comission_amount;
			// }

			// discount_amount
			if ($refer_setting->discount_type == 'percentage') {
				$discount_amount = $result->private_room * $refer_setting->discount_amount / 100;
			} else {
				$discount_amount =  $refer_setting->discount_amount*$numberOfAttendants;
			}
		}


		// $customer->referred_earning = $customer->referred_earning + $amount;
		// $customer->save();

		//After disocunt actual price is
		// credit customer amount
		// settings baata percentage or amount tannne
		$result->private_room = $result->private_room - $discount_amount;
		$result->share_room = $result->share_room - $discount_amount;


		return response()->json($result);
	}


    public function register_yoga($token = '')
	{
		// $results = \App\FeeList::all();
		// $user = session('User_id');

		// if ($token == '') {
		// 	return view('front.yoga_register', compact('results'));
		// } else {
		// 	$customer = \App\Customer::find($user);
		// 	return view('front.yoga_register', compact('results', 'customer', 'token'));
		// }

		$results = \App\FeeList::all();
        $fee_categories = FeeCategory::pluck('title','id');
		$valid_token = \App\Customer::where('referral_token',$token)->first();

		//$user = session('User_id');

            $user = auth('customer')->user();

			if ($valid_token) {

				$referral_name = $valid_token->name;
				if ($valid_token->id == $user->id) {
                    $token = '';
                    $valid_token =null;
                    $referral_name = '';


					session()->flash('msg', 'Self Refer Denied Token');
				} else {

					session()->flash('msg', 'Success Token Received');
				}
				//$compare = \App\Customer::find('name')->get();


			} else {
                $referral_name = '';
                $token ='';
                $valid_token =null;
				session()->flash('error', 'Token Invalid Access Denied');
				// return view('front.yoga_package', compact('results', 'token'));
			}

            return view('front.bookings.booking',
             compact('results','token','referral_name','valid_token','fee_categories'));



		//return view('front.yoga_register', compact('results', 'customer', 'token'));
	}


	public function bookings(Request $request)
	{
		$request->validate([
			'name' => 'required',
			'email' => 'required',
			'phone' => 'required',
			'address' => 'required',
			'numberOfAttendants' => 'required',
			'room_type' => 'required',
			'actual_price' => 'required',
            'package'=>'required'

		]);
		//$referral = Customer::select('email', 'status')->first();
		//$data_referral_one = $referral[0]->email;
		//$data_referral = $referral[1]->status;




        if($request->discounted_price){
            $result = Booking::create([
				'name' => trim($request->input('name')),
				'customer_id' => auth('customer')->user()->id,
				'email' => strtolower($request->input('email')),
				'phone' => $request->input('phone'),
				'address' => $request->input('address'),
				'numberOfAttendants' => $request->input('numberOfAttendants'),
				'room_type' => $request->input('room_type'),
				'actual_price' => $request->input('actual_price'),
				'status' => 0,
				'referred_by' => $request->input('referred_by'),
                'package_id'=>$request->package,
                'amount_to_be_paid'=> $request->input('discounted_price')

			]);
        }else{
            $result = Booking::create([
				'name' => trim($request->input('name')),
				'customer_id' => auth('customer')->user()->id,
				'email' => strtolower($request->input('email')),
				'phone' => $request->input('phone'),
				'address' => $request->input('address'),
				'numberOfAttendants' => $request->input('numberOfAttendants'),
				'room_type' => $request->input('room_type'),
				'actual_price' => $request->input('actual_price'),
                'package_id'=>$request->package,
				'status' => 0,
				'referred_by' => $request->input('referred_by'),
                'amount_to_be_paid'=> $request->input('actual_price')

			]);
        }


			// session()->flash('message', 'Your Booking is Done');

            Session::flash('message', 'Yoga Booked Successfully!');
            Session::flash('alert-class', 'alert-danger');

			return redirect()->route('customer.booking.index');

	}


    public function refer_page(){

        $user = auth('customer')->user();

        $customer = Customer::find($user->id);
        return view('front.bookings.refer',
        compact('customer')

        );
    }



	public function generate_token()
	{
		$user = auth('customer')->user();
		// $bookings = Booking::where('customer_id', $user->id)->where('status', '1')->first();
		// if ($bookings) {

			$token = Str::random(12);
			$customer = Customer::find($user->id);
			$customer->referral_token = $token;
			$customer->save();


			session()->flash('msg', 'Token Generated Successfully');

		return redirect()->route('customer.refer.page');
	}


	// public function refer_link($url)
	// {
	// 	session()->put('url', $url);

	// 	return redirect('login');
	// }





	public function userprofile_dashboard($token = '')
	{
		$user = session('User_id');

		$customer = \App\Customer::find($user);
		return view('front.userprofile_dashboard',
         compact('customer', 'token'));
	}


    public function delete(Request $request){

        $bookings = Booking::find($request->id);

        $bookings->delete();


        Session::flash('message', 'Yoga Booking deleted successfully!');
        Session::flash('alert-class', 'alert-danger');

        return redirect()->back();



    }

    public function getPackage($id){
        $bookings = FeeList::where('category_id',$id)->get();

        return response()->json($bookings);
    }


    public function validateToken($token){
        $customer = Customer::where('referral_token',$token)->first();

        if($customer){
            return response()->json([200,$customer]);
        }else{
            return response()->json([400,[]]);

        }
    }
}
