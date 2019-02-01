<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Package;

class PackageController extends Controller
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
            $agency = DB::table('agencies')->where('user_id', Auth::id())->first();
            //Agency::where('user_id', '==', Auth::id());
            return view('packages.create', compact('agency'));
        }
        return view('home');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $package = $this->validate(request(), [
          'agency_id' => 'required',
          'name' => 'required',
          'description' => 'required',
          'activities' => 'required',
          'price' => 'required'
        ]);

        Package::create($package);
        return view('home')->with('success','Package has been created.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $package = Package::find($id);
        return view('packages.show',compact('package','id'));
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
            $package = Package::find($id);
            return view('packages.edit',compact('package','id'));
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
        $package = Package::find($id);
        $this->validate(request(), [
            'agency_id' => 'required',
            'name' => 'required',
            'description' => 'required',
            'activities' => 'required',
            'price' => 'required'
        ]);
        $package->agency_id = $request->get('agency_id');
        $package->name = $request->get('name');
        $package->description = $request->get('description');
        $package->activities = $request->get('activities');
        $package->price = $request->get('price');
        $package->save();

        return redirect('home')->with('success','Package has been updated.');
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
