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
          'birthday' => 'required'
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
            $agency = Agency::find($id);
            return view('agencies.edit',compact('agency','id'));
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
        $agency = Agency::find($id);
        $this->validate(request(), [
            'user_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'address' => 'required',
            'mobile1' => 'required'
        ]);
        $agency->user_id = $request->get('user_id');
        $agency->name = $request->get('name');
        $agency->description = $request->get('description');
        $agency->address = $request->get('address');
        $agency->mobile1 = $request->get('mobile1');
        $agency->mobile2 = $request->get('mobile2');
        $agency->landline1 = $request->get('landline1');
        $agency->landline2 = $request->get('landline2');
        $agency->fax = $request->get('fax');
        $agency->save();

        return redirect('home')->with('success','Agency Profile has been updated.');
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
