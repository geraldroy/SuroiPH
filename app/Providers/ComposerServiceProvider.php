<?php

namespace App\Providers;

use View;
use Illuminate\Support\ServiceProvider;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use App\User;
use App\Agency;
use App\Customer;
use App\Package;
use App\Transaction;

class ComposerServiceProvider extends ServiceProvider {

    public function boot()
    {
        if (Auth::check()) {
            $user = User::find(Auth::id());

            if($user->type == 'customer') {
                $customer = Customer::where('user_id', '=', $user->id)->first();
                if($customer == null) {   //create profile first
                    return redirect('customers/create');
                }
                $orders = DB::table('transactions')-> where('customer_id', '=', $customer->id)
                    -> join('packages', 'transactions.package_id', '=', 'packages.id')
                    -> join('agencies', 'packages.agency_id', '=', 'agencies.id')
                    -> select('transactions.id as transaction_id','packages.name as package_name', 'agencies.name as agency_name', 'packages.price as package_price', 'status as status')
                    -> get();

                View::composer('layouts.app', function($view) {
                    $view->with('user', $user, 'customer', $customer, 'orders', $orders);
                });
            }

            else {
                View::composer('layouts.app', function($view) {
                    $view->with('user', $user);
                });
            }
        }
    }


    public function register()
    {
        //
    }
}
