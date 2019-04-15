<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Customer;

class CustomerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if (Auth::check()) {
            if(Customer::where('user_id', '==', Auth::id())->count() < 1) {
                return view('customers.create'); }
            else return view('home');
        }
        return view('auth.register');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $customer = $this->validate(request(), [
          'user_id' => 'required',
          'name_first' => 'required',
          'name_last' => 'required',
          'name_middle' => 'required',
          'address_street1' => 'required',
          'address_barangay' => 'required',
          'address_mun_city' => 'required',
          'address_province' => 'required',
          'mobile' => 'required',
          'birthday' => 'required',
          'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        Customer::create($customer);
        return redirect('home')->with('success','Your profile has been created.');
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
        if (Auth::check() && $id == Auth::id()) {
            $customer = Customer::find($id);
            return view('customers.edit',compact('customer','id'));
        }
        return view("welcome");
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
        $customer = Customer::find($id);
        $this->validate(request(), [
            'user_id' => 'required',
            'name_first' => 'required',
            'name_last' => 'required',
            'name_middle' => 'required',
            'address_street1' => 'required',
            'address_barangay' => 'required',
            'address_mun_city' => 'required',
            'address_province' => 'required',
            'mobile' => 'required',
            'birthday' => 'required',
            'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $customer->user_id = $request->get('user_id');
        $customer->name_first = $request->get('name_first');
        $customer->name_last = $request->get('name_last');
        $customer->name_middle = $request->get('name_middle');
        $customer->name_suffix = $request->get('name_suffix');
        $customer->address_street1 = $request->get('address_street1');
        $customer->address_street2 = $request->get('address_street2');
        $customer->address_barangay = $request->get('address_barangay');
        $customer->address_mun_city = $request->get('address_mun_city');
        $customer->address_province = $request->get('address_province');
        $customer->mobile = $request->get('mobile');
        $customer->birthday = $request->get('birthday');
        $customer->photo = $request->get('photo');
        $customer->save();

        return redirect('home')->with('success','Profile has been updated.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
