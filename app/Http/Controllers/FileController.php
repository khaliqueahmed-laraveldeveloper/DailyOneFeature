<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreFileRequest;
use App\Http\Requests\UpdateFileRequest;
use App\Models\File;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
       $files= file::all();
       if($files->isEmpty()) {
        return view('files.index');
         }
         else{
            return view('files.index', compact('files'));
         }
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    // public function store(StoreFileRequest $request)
    // {
    //     //
    // }

    public function store(Request $request) {
    $request->validate(['file' => 'required|file']);

    if($request->hasFile('file')) {
        // This uploads directly to S3
        $path = $request->file('file')->store('s3', 's3');

        File::create([
            'title' => $request->file('file')->getClientOriginalName(),
            'path' => $path,
            'mime_type' => $request->file('file')->getClientMimeType(),
        ]);
    }
    return back()->with('success', 'File Uploaded to AWS!');
}

    /**
     * Display the specified resource.
     */
    public function show(File $file)
    {
      
       $url=null;
        if(Storage::disk('s3')->exists($file->path)){
           $url = Storage::disk('s3')->temporaryUrl(
                $file->path, 
                now()->addMinutes(5)
            );
        }
        $type=explode('/',$file->mime_type)[0];
       
        // dd($type);
       return view('files.view', compact( 'url', 'type'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(File $file)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateFileRequest $request, File $file)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(File $file)
    {
        if (Storage::disk('s3')->exists($file->path)) {
        Storage::disk('s3')->delete($file->path);
    }
    
    // Delete from Database
    $file->delete();
    return back();
    }
}
