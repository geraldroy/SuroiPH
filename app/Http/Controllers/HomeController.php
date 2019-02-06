<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\User;
use App\Agency;
use App\Package;

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
                $agency = Agency::where('user_id', '=', $user->id)->first();
                $packages = Package::where('agency_id', '=', $agency->id)->get();
                return view('home', compact('user', 'packages'));
            }
            //customer
            return view('home', compact('user'));
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
