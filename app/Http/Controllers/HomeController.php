<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\StoreFile;
use App\User;
use Illuminate\Support\Facades\Hash;

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
    public function updatepassword(){
        return view('updatePassword');
    }

    public function updateuserpass(Request $request){
         $validatedData = $request->validate([
            'oldpassord' => 'required',
            'password' => 'required|confirmed|min:5',
        ]);
        $user=User::where('id',$request->user)->first();
        if(Hash::check($request->oldpassord, $user->password)){
            $user->password=Hash::make($request->password);
            $user->save();
            $notification=array(
            'messege'=> 'Password update Successfully!!',
            'alart-type'=>'success'
        );
        return redirect('/')->with($notification);
        }else{
        $notification=array(
        'messege'=> 'Old Password not Match!!',
        'alart-type'=>'error'
        );
        return redirect()->back()->with($notification);

        }

    }
}
