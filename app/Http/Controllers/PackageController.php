<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use App\Package;
use App\User;

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
            $user = User::find(Auth::id());
            if($user->type != 'customer') {
                $agency = DB::table('agencies')->where('user_id', Auth::id())->first();
                $locations = DB::table('tags')->where('type', '=', 'location')->orderBy('name')->get();
                return view('packages.create', compact('agency', 'locations'));
            }
        }
        return redirect()->route('home');
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
          'price' => 'required',
          'location_id' => 'required',
          'photo1' => 'required',
          'photo1.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'photo2.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'photo3.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'photo4.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
          'photo5.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        $photos = ['photo1', 'photo2', 'photo3', 'photo4', 'photo5'];
        foreach ($photos as $key => $photo) {
            if($request->hasFile($photo)) {
                $image = $request->file($photo);
                $name = time().'_'.str_slug($request->input('name')).'_'.$key;
                $folder = '/uploads/packages/';
                $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
                $this->uploadPhoto($image, $folder, 'public', $name);
                $package[$photo] = $filePath;
            }
        }

        Package::create($package);
        return redirect()->route('home')->with('success','Package has been created.');
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
        return view('packages.show', compact('package','id'));
    }

    /**
     * Book a package transaction
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function book($id)
    {
        $package = Package::find($id);
        $user = User::find(Auth::id());
        $customer = DB::table('customers')->where('user_id', $user->id)->first();
        return view('transactions.create', compact('package', 'customer'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $package = Package::find($id);
        $agency = DB::table('agencies')->where('user_id', Auth::id())->first();
        if (Auth::check() && $package->agency_id == $agency->id) {
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
        $package = Package::find($id);
        $package->delete();

        return redirect('home')->with('success', 'Package has been deleted Successfully');
    }

    public function uploadPhoto(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
        return $file;
    }
}
