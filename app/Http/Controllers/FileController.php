<?php

namespace App\Http\Controllers;

use App\file;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use App\StoreFile;
use App\User;

class FileController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function download($id)
    {
        $headers = array(
            'Content-Disposition' => 'inline',
        );
        $userFile=StoreFile::findorfail($id);
        return response()->download($userFile->fileName,$userFile->Name , $headers);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('upload');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if($request->fileName){
            $number=count($request->fileName);
        }else{
            $number=0;
        }


        if ($number <= 0) {
            $notification = array(
                'messege' => 'Please select file frist!!',
                'alart-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $userId=Auth::user()->id;
            $used=Auth::user()->fileSize;
            if($used >= Auth::user()->maxCapacity){
                $notification = array(
                    'messege' => 'You are running out of stroage!!',
                    'alart-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }else {

            for ($i=0; $i <$number ; $i++) {

            $file = $request->file('fileName');
            $fileName[$i]=$file[$i]->getClientOriginalName();
            $fileExtention[$i]=$file[$i]->getClientOriginalExtension();
            $file_size[$i]=$file[$i]->getSize();
            $file_size[$i] = number_format($file_size[$i] / 1048576,2);
            $updateUsed = $used + $file_size[$i];
            if ($updateUsed >= Auth::user()->maxCapacity) {
                $notification = array(
                'messege' => 'You are running out of stroage!!',
                'alart-type' => 'error'
             );
            return redirect()->back()->with($notification);
            }else{
                $destinationPath = 'userFile';
                $file[$i]->move($destinationPath,$fileName[$i]);
                $filePath[$i]=$destinationPath."/".$fileName[$i];

                $storeFile=new storeFile;
                $storeFile->Name=$fileName[$i];
                $storeFile->fileName=$filePath[$i];
                $storeFile->userId=$userId;
                $storeFile->fileSize=$file_size[$i];
                $storeFile->extention=$fileExtention[$i];
                $storeFile->save();
                $user=User::findorfail($userId);
                $user->fileSize=$updateUsed;
                $user->save();
             }
            }
            $notification=array(
                    'messege'=> 'File added Successfully',
                    'alart-type'=>'success'
                 );
            return redirect()->back()->with($notification);
            }
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function show(file $file)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $userFile=StoreFile::findorfail($id);
        return view('update')->with('userFile',$userFile);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $userFile=StoreFile::findorfail($request->fileId);
        if ($request->Name == $userFile->Name) {
             $notification = array(
                'messege' => 'Change your file name frist!!',
                'alart-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }else{
            $ext='.'.$userFile->extention;
            $newName=Str::before($request->Name, $ext);
            $newName=$newName.$ext;
            $userFile->Name=$newName;
            $userFile->save();
              $notification=array(
            'messege'=> 'File Name Change Successfullay!!',
            'alart-type'=>'success'
        );
            return redirect()->back()->with($notification);

        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\file  $file
     * @return \Illuminate\Http\Response
     */
    public function destroy( $id)
    {
        $userFile=StoreFile::findorfail($id);
        $userId=Auth::user()->id;
        $used=Auth::user()->fileSize;
        $updateUsed = $used - $userFile->fileSize ;
        $user=User::findorfail($userId);
        $user->fileSize=$updateUsed;
        $user->save();
        unlink($userFile->fileName);
        $userFile->delete();
        $notification=array(
            'messege'=> 'File Delete Successfully!!',
            'alart-type'=>'success'
        );
        return redirect()->back()->with($notification);

    }
}
