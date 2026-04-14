<?php

namespace App\Http\Controllers\Admin;

use App\Models\Booking;
use App\Models\Customer;
use App\Models\FeeCategory;
use App\Models\FeeList;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\ReferSetting;

class BookingsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = Booking::select('*',
                        'bookings.id as id',
                        'bookings.name as name',
                        'bookings.email as email',
                        'customers.name as customer_name',
                        'bookings.status as status',
                        'bookings.created_at as created_at'
                        )
                        ->leftjoin('customers','customers.id','=','bookings.referred_by')
                        ->orderBy('bookings.created_at', 'desc')
                        ->get();

        return view('admin.bookings.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fee_categories = FeeCategory::pluck('title','id');
        $results = FeeList::all();
        $customer_id = Customer::all();
        return view('admin.bookings.create', compact('results', 'customer_id','fee_categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $phone_number = $request['phone_number']['full'];
        $rules  = [
            'name' => 'required',
            'customer_id' =>'required',
            'name' =>'required',
            'email'=>'required',
            // 'phone'=>'required',
            'numberOfAttendants'=>'required',
            'room_type'=>'required',
            'actual_price'=>'required'
        ];

        $msg = [
            'customer_id'=>'customer'
        ];
        $request->validate($rules,$msg);

        $information = new Booking();



        $information->customer_id = $request->customer_id;
        $information->name = $request->name;
        $information->email = $request->email;
        $information->phone = $phone_number;
        $information->numberOfAttendants = $request->numberOfAttendants;
        $information->room_type = $request->room_type;
        $information->package_id = $request->package;
        $information->actual_price = $request->actual_price;
        $information->address = $request->address;
        $information->amount_to_be_paid = $request->amount_to_be_paid;
        //$information->referral_amount = $request->referral_amount;
        // dd($information);
        $information->save();
        return redirect('admin/bookings')->with('msg', 'Information Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $information = Booking::find($id);

        $results = FeeList::all();
        $customer_id = Customer::all();

        // dd($information);
        return view('admin.bookings.edit', compact('information',
            'results',
            'customer_id'
        ));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $phone_number = $request['phone_number']['full'];
        $rules  = [
            'name' => 'required',
            'customer_id' =>'required',
            'name' =>'required',
            'email'=>'required',
            // 'phone'=>'required',
            'numberOfAttendants'=>'required',
            'room_type'=>'required',
            'actual_price'=>'required'
        ];

        $msg = [
            'customer_id'=>'customer'
        ];

        $request->validate($rules,$msg);

        $information = Booking::find($id);



        $information->customer_id = $request->customer_id;
        $information->name = $request->name;
        $information->email = $request->email;
        $information->phone = $phone_number;
        $information->numberOfAttendants = $request->numberOfAttendants;
        $information->room_type = $request->room_type;
        $information->package_id = $request->package;
        $information->actual_price = $request->actual_price;
        $information->address = $request->address;
        $information->amount_to_be_paid = $request->amount_to_be_paid;
        //$information->referral_amount = $request->referral_amount;

        $information->save();
        return redirect('admin/bookings')->with('msg', 'Information Updated');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = Booking::find($id);
        $information->delete();
        return redirect('admin/bookings')->with('information Deleted');
    }

    public function status($id)
    {
        $model = Booking::find($id);
        $model->status = '1';
        $model->save();




        $customer =  Customer::find($model->referred_by);

        if($customer){
            $refer_setting = ReferSetting::first();

            if($refer_setting->comission_type=='percentage'){
                $comission = $model->actual_price * $refer_setting->comission_amount/100;
            }else{

                $comission = $refer_setting->comission_amount;

            }

            $customer->referred_earning =  $customer->referred_earning+$comission;

            $customer->save();
        }




        // $request->session()->flash('message', '');
        return redirect('admin/bookings')->with('Status Updated');
    }

    public function set_price($id, $numberOfAttendants)
    {
        $result = FeeList::find($id);

        // referer discount type percentage

        // $result * 100/amount
        $result->share_room = $result->share_room * $numberOfAttendants;
        $result->private_room = $result->private_room * $numberOfAttendants;

        return response()->json($result);
    }
}
