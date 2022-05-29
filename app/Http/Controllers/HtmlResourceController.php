<?php

namespace App\Http\Controllers;

use App\Models\HtmlResource;
use App\Http\Requests\StoreHtmlResourceRequest;
use App\Http\Requests\UpdateHtmlResourceRequest;
use App\Http\Resources\HtmlResourceResource;

class HtmlResourceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return HtmlResourceResource::collection(HtmlResource::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreHtmlResourceRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreHtmlResourceRequest $request)
    {
        $html = HtmlResource::create($request->all());

        return response()->json($html, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HtmlResource  $htmlResource
     * @return \Illuminate\Http\Response
     */
    public function show(HtmlResource $htmlResource)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateHtmlResourceRequest  $request
     * @param  \App\Models\HtmlResource  $htmlResource
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateHtmlResourceRequest $request, HtmlResource $htmlResource)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HtmlResource  $htmlResource
     * @return \Illuminate\Http\Response
     */
    public function destroy(HtmlResource $htmlResource)
    {
        //
    }
}
