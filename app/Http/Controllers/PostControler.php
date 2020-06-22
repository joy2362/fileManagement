<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Post;
use App\storeFile;

class PostControler extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
     public function index()
    {
        $post=Post::paginate(5);
        $userId=Auth::user()->id;
        $totalFile=storeFile::where('userId',$userId)->count();
        return view('allForumPost')->with('post',$post)->with('totalFile',$totalFile);
    }

     public function create()
    {
        return view('forum');
    }

    public function store(Request $request)
    {
         $validatedData = $request->validate([
            'image' => 'mimes:jpeg,png,jpg|max:3036',
            'title' =>'required|max:150',
            'description' =>'required|max:1000'
        ]);
         $post=new Post;
        if ($request->file('image')) {
            $file = $request->file('image');
            $fileName=$file->getClientOriginalName();
            $destinationPath = 'postImage';
            $file->move($destinationPath,$fileName);
            $filePath=$destinationPath."/".$fileName;
            $post->image=$filePath;
        }

        $post->title=$request->title;
        $post->description=$request->description;

        $post->user_id=$request->id;
        $post->save();
        $notification=array(
            'messege'=> 'Post added Successfully',
            'alart-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }

}
