<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;
use App\Tag;

class TagController extends Controller
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
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $tag = $this->validate(request(), [
          'name' => 'required',
          'parent' => 'required',
          'type' => 'required',
          'photo.*' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);
        $tag['name'] = strtolower($tag['name']);

        // Check if a profile image has been uploaded
        if($request->has('photo')) {
           // Get image file
           $image = $request->file('photo');
           // Make a image name based on user name and current timestamp
           $name = time().'_'.str_slug($request->input('name'));
           // Define folder path
           $folder = '/uploads/tags/';
           // Make a file path where image will be stored [ folder path + file name + file extension]
           $filePath = $folder . $name. '.' . $image->getClientOriginalExtension();
           // Upload image
           $this->uploadPhoto($image, $folder, 'public', $name);
           // Set user profile image path in database to filePath
           $tag['photo'] = $filePath;
        }
        $tag['description'] = $request->input('description');

        Tag::create($tag);
        return redirect()->route('home')->with('success','Tag successfully created.');
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
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function uploadPhoto(UploadedFile $uploadedFile, $folder = null, $disk = 'public', $filename = null)
    {
        $name = !is_null($filename) ? $filename : str_random(25);
        $file = $uploadedFile->storeAs($folder, $name.'.'.$uploadedFile->getClientOriginalExtension(), $disk);
        return $file;
    }
}
