<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CicloFormativoResource;
use App\Models\CicloFormativo;
use Illuminate\Http\Request;

class CicloFormativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CicloFormativoResource::collection(CicloFormativo::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $cicloData = json_decode($request->getContent(), true);

        $ciclo = CicloFormativo::create($cicloData);

        return new CicloFormativoResource($ciclo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\CicloFormativo  $cicloFormativo
     * @return \Illuminate\Http\Response
     */
    public function show(CicloFormativo $cicloFormativo)
    {
        return new CicloFormativoResource($cicloFormativo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CicloFormativo  $cicloFormativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, CicloFormativo $cicloFormativo)
    {
        $cicloFormativoData = json_decode($request->getContent(), true);

        $cicloFormativo->update($cicloFormativoData);

        return new CicloFormativoResource($cicloFormativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CicloFormativo  $cicloFormativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(CicloFormativo $cicloFormativo)
    {
        $cicloFormativo->delete();

        $mensaje = ['estado' => 'eliminado'];

        return response()->json($mensaje);
    }
}
