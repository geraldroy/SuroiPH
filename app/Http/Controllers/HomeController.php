<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Agency;
use App\Customer;
use App\Package;
use App\Transaction;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            if($user->type == 0) { //super admin

            }
            else if($user->type == 1) { //agency
                $agency = Agency::where('user_id', '=', $user->id)->first();
                if($agency == null) {   //create profile first
                    return redirect('agencies/create');
                }
                $packages = Package::where('agency_id', '=', $agency->id)->get();
                return view('home', compact('user', 'packages'));
            }
            else if($user->type == 2) { //customer
                $customer = Customer::where('user_id', '=', $user->id)->first();
                if($customer == null) {   //create profile first
                    return redirect('customers/create');
                }
                $orders = DB::table('transactions')-> where('customer_id', '=', $customer->id)
                    -> join('packages', 'transactions.package_id', '=', 'packages.id')
                    -> join('agencies', 'packages.agency_id', '=', 'agencies.id')
                    -> select('transactions.id as transaction_id','packages.name as package_name', 'agencies.name as agency_name', 'packages.price as package_price', 'status as status')
                    -> get();

                return view('home', compact('user','orders'));
            }
        }
        return view('welcome');
    }


    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function search()
    {
        return view('search');
    }
}
