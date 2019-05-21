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
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());
            //----- SUPER ADMIN ------
            if($user->type == 'admin') {
                $agencies = DB::table('agencies')
                    ->join('packages', 'agencies.id', '=', 'packages.agency_id')
                    ->select('agencies.name as name', 'agencies.description as description', DB::raw('count(packages.agency_id) as packages_count'))
                    ->groupBy('agencies.id')->get();
                $customers = DB::table('customers')
                    ->join('users', 'customers.user_id', '=', 'users.id')
                    ->join('transactions', 'customers.id', '=', 'transactions.customer_id', 'left outer')
                    ->select('customers.name_first as firstname', 'customers.name_last as lastname', 'users.email as email', 'customers.photo as photo', DB::raw('count(transactions.customer_id) as transactions_count'))
                    ->groupBy('customers.id')->get();
                $locations = DB::table('tags')->where('type', '=', 'location')->orderBy('name')->get();
                $activities = DB::table('tags')->where('type', '=', 'activity')->orderBy('name')->get();

                return view('home', compact('user', 'agencies', 'customers', 'locations', 'activities'));
            }
            //----- end of SUPER ADMIN ------

            //----- AGENCY ------
            else if($user->type == 'agency') {
                $agency = Agency::where('user_id', '=', $user->id)->first();

                if($agency == null) {   //create profile first
                    return redirect('agencies/create');
                }
                $packages = Package::where('agency_id', '=', $agency->id)->get();
                $transactions = DB::table('transactions')
                    ->join('packages', 'transactions.package_id', '=', 'packages.id')
                    ->join('customers', 'transactions.customer_id', '=', 'customers.id')
                    ->where('transactions.agency_id', '=', $agency->id)
                    ->select('transactions.id as id' ,'packages.name as package_name', 'customers.name_last as customer_name', 'packages.price as package_price')
                    ->get();

                return view('home', compact('user', 'packages', 'transactions'));
            }
            //----- end of AGENCY ------

            //----- CUSTOMER ------
            else if($user->type == 'customer') {
                $customer = Customer::where('user_id', '=', $user->id)->first();
                if($customer == null) {   //create profile first
                    return redirect('customers/create');
                }
                $orders = DB::table('transactions')-> where('customer_id', '=', $customer->id)
                    -> join('packages', 'transactions.package_id', '=', 'packages.id')
                    -> join('agencies', 'packages.agency_id', '=', 'agencies.id')
                    -> select('transactions.id as transaction_id','packages.name as package_name', 'agencies.name as agency_name', 'packages.price as package_price', 'status as status')
                    -> get();
                return view('home', compact('user', 'customer', 'orders'));
            }
            //----- end of CUSTOMER ------
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
