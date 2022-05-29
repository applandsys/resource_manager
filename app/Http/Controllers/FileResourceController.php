<?php

namespace App\Http\Controllers;

use App\Models\FileResource;
use App\Http\Requests\StoreFileResourceRequest;
use App\Http\Requests\UpdateFileResourceRequest;
use Illuminate\Http\Request ;
use App\Http\Resources\FileResourceResource;


class FileResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       // return FileResource::all();
       return FileResourceResource::collection(FileResource::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreFileResourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFileResourceRequest $request)
    {
        $post_data = $request->all();
        $file_title = $post_data['title'];
        $file_description = $post_data['description'];

        $File_resource = new FileResource;

        try{
            if($request->hasFile('pdf')){
                $file = $request->file('pdf');
                $file_name = time().'-'.$file->getClientOriginalName();
                $file_ext = $file->getClientOriginalExtension();
                $file_path = $file->getRealPath();
                $file_size = $file->getSize();

                $file->move(public_path('pdf_resources'), $file_name);

                $File_resource->title =  $file_title;
                $File_resource->file_name =  $file_name ;
                $File_resource->file_ext =   $file_ext;
                $File_resource->file_size =   $file_size ;
                $File_resource->file_path =   $file_path ;
                $File_resource->description =  $file_description;
        
                $File_resource->save();
                
                return  $File_resource;

            }
        }catch(Throwable $e){
             return response()->json(['message'=>$e->getMessage()]);
        }

     
    }


    public function uploadFile(Request $request){
        $post_data = $request->all();
        $file_title = $post_data['title'];
        $file_description = $post_data['description'];

        $File_resource = new FileResource;

        $File_resource->title =  $file_title;
        $File_resource->description =  $file_description;

        $File_resource->save();

       // ['title','description','file_name','file_ext','file_size','file_path'];

        try{
            if($request->hash_file('pdf')){


            }
        }catch(Throwable $e){
            report($e);
            return false;
        }
       // return response()->json(['fuck'=> $post_data ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FileResource  $fileResource
     * @return \Illuminate\Http\Response
     */
    public function show(FileResource $fileResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFileResourceRequest  $request
     * @param  \App\Models\FileResource  $fileResource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFileResourceRequest $request, FileResource $fileResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FileResource  $fileResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(FileResource $fileResource)
    {
        //
    }
}
