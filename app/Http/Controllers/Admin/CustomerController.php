<?php

namespace App\Http\Controllers\Admin;

use App\Customer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $informations = \App\Customer::orderBy('created_at', 'desc')->get();
        return view('admin.customer.index', compact('informations'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return view('admin.customer.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'email'=>'unique:customers,email',
            'name'=>'required',
            'password'=>'required|min:8'
        ];

        $request->validate($rules);
        $information = new Customer();

        $information->image = '';

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $path = public_path() . 'uploads';
        //     $filename = date('ymdhis') . $file->getClientOriginalName();
        //     $file->move($path, $filename);
        //     $information->image = $filename;
        // }
        $information->name = $request->name;
        $information->email = $request->email;
        $information->password = Hash::make($request->password);
        // $information->gender = $request->gender;
        // $information->nationality = $request->nationality;
        // $information->dob = $request->dob;
        // $information->address = $request->address;
        // $information->contact = $request->contact;
        $information->save();
        return redirect('admin/customers')->with('msg', 'Information Added');
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
        $information = Customer::find($id);
        return view('admin.customer.edit', compact('information'));
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
        $rules = [
            'email'=>'unique:customers,email,'.$id,
            'name'=>'required',
            // 'password'=>'required|min:8'
        ];

        $request->validate($rules);
        $information = Customer::find($id);

        // $information->image = '';

        // if ($request->hasFile('image')) {
        //     $file = $request->file('image');
        //     $path = public_path() . 'uploads';
        //     $filename = date('ymdhis') . $file->getClientOriginalName();
        //     $file->move($path, $filename);
        //     $information->image = $filename;
        // }
        $information->name = $request->name;
        $information->email = $request->email;
        // $information->password = Hash::make($request->password);
        // $information->gender = $request->gender;
        // $information->nationality = $request->nationality;
        // $information->dob = $request->dob;
        // $information->address = $request->address;
        // $information->contact = $request->contact;
        $information->save();
        return redirect('admin/customers')->with('msg', 'Information Updated');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $information = \App\Customer::find($id);
        $information->delete();
        return redirect('admin/customers')->with('information Deleted');
    }

    public function status(Request $request, $status, $id)
    {
        $model = Customer::find($id);
        $model->status = $status;
        $model->save();
        $request->session()->flash('message', 'Status Updated');
        return redirect('admin/customers');
    }

    public function set_actual_price($id, $numberOfAttendants)
    {
        $result = \App\FeeList::find($id);

        // referer discount type percentage

        // $result * 100/amount
        $result->share_room = $result->share_room * $numberOfAttendants;
        $result->private_room = $result->private_room * $numberOfAttendants;

        return response()->json($result);
    }


    // clear payment for referrer
    public function clearPayment($id){
        $customer = Customer::find($id);

        $customer->referred_earning = '0';

        $customer->save();

        return redirect()->back()->with('msg', 'Referer Payment cleared');
        ;
    }
}
