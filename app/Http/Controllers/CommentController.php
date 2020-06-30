<?php

namespace App\Http\Controllers;
use App\PostComment;
use Illuminate\Http\Request;

class CommentController extends Controller
{
    public function store(Request $request){
        $validatedData = $request->validate([
            'comment' =>'required|min:2',
        ]);
        $comment = new PostComment;
        $comment->user_id = $request->user_id;
        $comment->post_id = $request->post_id;
        $comment->comment =$request->comment;
        $comment->save();
         $notification=array(
            'messege'=> 'Comment added Successfully',
            'alart-type'=>'success'
        );
        return redirect()->back()->with($notification);
    }
}
