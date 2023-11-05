<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function test(){
        $imgName = auth()->user()->profile->photo;
        $photo2 = $imgName;
        //dd($photo2);
        return view("test",compact("photo2"));
    }
    public function testSubmit(Request $request){
        //"photo" => ["required", "mimes:jpeg,jpg,png", "max:2048"],
        $profile = Profile::find(auth()->user()->profile->id);

        //dd($request->all());
        //dd($request->file('photo')->getClientOriginalName());
        
        if($request->hasFile('photo')){
            $imageName = $profile->id.'_photo_'.$request->file('photo')->getClientOriginalName();
            
            $request->photo->move('assets/uploads/', $imageName);
            $profile->photo=$imageName;   
            //dd("found");
        }
        $profile->save();
        dd($profile->photo);
        return view("test");
    }
}
