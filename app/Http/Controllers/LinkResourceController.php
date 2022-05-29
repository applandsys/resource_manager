<?php

namespace App\Http\Controllers;

use App\Models\LinkResource;
use App\Http\Requests\StoreLinkResourceRequest;
use App\Http\Requests\UpdateLinkResourceRequest;
use App\Http\Resources\LinkResourceResource;

class LinkResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return LinkResourceResource::collection(LinkResource::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreLinkResourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreLinkResourceRequest $request)
    {
        $link = LinkResource::create($request->all());

        return response()->json($link, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\LinkResource  $linkResource
     * @return \Illuminate\Http\Response
     */
    public function show(LinkResource $linkResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateLinkResourceRequest  $request
     * @param  \App\Models\LinkResource  $linkResource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateLinkResourceRequest $request, LinkResource $linkResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\LinkResource  $linkResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(LinkResource $linkResource)
    {
        //
    }
}
