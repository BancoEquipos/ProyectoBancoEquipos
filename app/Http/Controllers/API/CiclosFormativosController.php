<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\CiclosFormativos;
use Illuminate\Http\Request;
use App\Http\Resources\CiclosFormativosResource;

class CiclosFormativosController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CiclosFormativosResource::collection(CiclosFormativos::paginate());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CiclosFormativos  $ciclosFormativos
     * @return \Illuminate\Http\Response
     */
    public function show(CiclosFormativos $ciclosFormativos)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\CiclosFormativos  $ciclosFormativos
     * @return \Illuminate\Http\Response
     */
    public function edit(CiclosFormativos $ciclosFormativos)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CiclosFormativos  $ciclosFormativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CiclosFormativos $ciclosFormativos)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CiclosFormativos  $ciclosFormativos
     * @return \Illuminate\Http\Response
     */
    public function destroy(CiclosFormativos $ciclosFormativos)
    {
        //
    }
}
