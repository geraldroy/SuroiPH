<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use App\Transaction;
use App\TransactionStatus;

class TransactionController extends Controller
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
        return view('transactions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $transaction = new Transaction();
        $transaction->customer_id = $request->get('customer_id');
        $transaction->package_id = $request->get('package_id');
        $transaction->agency_id = DB::table('packages')->where('id', $request->get('package_id'))->value('agency_id');
        $transaction->save();

        $transaction_status = new TransactionStatus;
        $transaction_status->transaction_id = $transaction->id;
        $transaction_status->status = "pending";
        $transaction_status->user_id = Auth::user()->id;
        $transaction_status->save();

        return redirect()->route('home')->with('success','Thank you for booking. You may now proceed with payment.');
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
        //
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
        //
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function cancel(Request $request, $id)
    {
        $transaction = Transaction::find($id);
        $transaction->status =  -1;
        $transaction->save();

        return redirect()->route('home')->with('success','Booking has been successfully cancelled.');
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


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function agencyApproval(Request $request, $id)
    {
        $transaction_status = new TransactionStatus;
        $transaction_status->transaction_id = $id;
        $transaction_status->status = $request->status;
        $transaction_status->remarks = $request->remarks;
        $transaction_status->user_id = Auth::user()->id;
        $transaction_status->save();

        return redirect()->route('home')->with('success','Booking has been successfully updated.');
    }
}
