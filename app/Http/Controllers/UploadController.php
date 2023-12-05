<?php

namespace App\Http\Controllers;

use App\Models\Upload;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\File;
use Illuminate\Http\Response;

class UploadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $uploads = Upload::get();
        return view('uploads.index', ['uploads' => $uploads]);
    }

    public function create()
    {
        return view('uploads.create');
    }

    public function store(Request $request)
    {
        $upload = new Upload;

        $upload->mimeType = $request->file('upload')->getMimeType();
        $upload->slug=$request->input('slug');
        $upload->originalName = $request->file('upload')->getClientOriginalName();
        $upload->path = $request->file('upload')->store('uploads');
        $upload->excerpt = $request->input('excerpt');
        $upload->description = $request->input('description');

        $upload->save();
        return view('uploads.create',
            ['id'=>$upload->id,
            'slug'=>$upload->slug,
            'path'=>$upload->path,
            'originalName'=>$upload->originalName,
            'excerpt'=>$upload->excerpt,
            'description'=>$upload->description,
            'mimeType'=>$upload->mimeType]
        );
    }

    public function show(Upload $upload,$originalName='')
    {
        $upload = Upload::findOrFail($upload->id);
        //dd($upload);
        return response()->file(storage_path() . '/app/' . $upload->path);
    }
    

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function edit(Upload $upload)
    {
        return view('uploads.edit', compact('upload'));
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Upload $upload)
   {
    $validatedData = $request->validate([
        'originalName' => 'required|string|max:255',
        'excerpt' => 'required|string',
        'description' => 'required|string',
        'upload' => 'file', 
    ]);

    // If the user selects a new file, updating it 
    if ($request->hasFile('upload')) {

        Storage::delete($upload->path);

        // upload new
        $path = $request->file('upload')->store('uploads');
        $upload->path = $path;
        $upload->mimeType = $request->file('upload')->getClientMimeType();
        $upload->originalName = $request->file('upload')->getClientOriginalName();
    }

     $upload->excerpt = $validatedData['excerpt'];
     $upload->description = $validatedData['description'];
     $upload->save();

     return redirect()->route('dashboard')->with('success', 'Upload updated successfully');
   }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Upload  $upload
     * @return \Illuminate\Http\Response
     */
    public function destroy(Upload $upload)
    {
        $upload = Upload::findOrFail($upload->id);
        Storage::delete($upload->path);
        $upload->delete();
        return back()->with(['operation'=>'deleted', 'id'=>$upload->id]);
    }

    public function dashboard()
    {
    $uploads = Upload::all(); // 获取所有上传记录
    return view('dashboard', ['uploads' => $uploads]); // 传递给视图
    }

    // UploadController.php
     public function view(Upload $upload)
     {
      return view('uploads.view', ['upload' => $upload, 'id'=>$upload->id,'originalName'=>$upload->originalName]);
     }




}
