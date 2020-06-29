<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StoreFile;
use App\User;

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
        $userId=Auth::user()->id;
        $userFile=storeFile::where('userId',$userId)->paginate(5);
        $totalFile=storeFile::where('userId',$userId)->count();
        return view('index')->with('FilesInfo',$userFile)->with('totalFile',$totalFile);
    }
    public function profile()
    {
        return view('userProfile');
    }
    public function contact() {
        return view('about');
    }
    public function updateProfileImage(Request $request)
    {
        $validatedData = $request->validate([
            'image' => 'mimes:jpeg,png,jpg|max:3036',
        ]);
        $image = $_FILES["image"]["name"];
        $temp_name = $_FILES["image"]["tmp_name"];
        $folder = "profile/" . $image;
        move_uploaded_file($temp_name, $folder);
        $user = User::where('id',$request->old_id)->first();
        $old_img = $user->image;
        unlink($old_img);
        $user->image= $folder;
        $user->save();
         $notification=array(
            'messege'=> 'Profile update Successfully!!',
            'alart-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
