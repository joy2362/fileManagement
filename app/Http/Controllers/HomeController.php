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
}
