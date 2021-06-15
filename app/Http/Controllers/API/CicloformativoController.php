<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Http\Resources\CicloformativoResource;
use App\Models\Cicloformativo;
use Illuminate\Http\Request;

class CicloformativoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return CicloformativoResource::collection(Cicloformativo::paginate());
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

        $ciclo = Cicloformativo::create($cicloData);

        return new CicloformativoResource($ciclo);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Cicloformativo  $cicloFormativo
     * @return \Illuminate\Http\Response
     */
    public function show(Cicloformativo $cicloFormativo)
    {
        return new CicloformativoResource($cicloFormativo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Cicloformativo  $cicloFormativo
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cicloformativo $cicloFormativo)
    {
        $cicloFormativoData = json_decode($request->getContent(), true);
        $cicloFormativo->update($cicloFormativoData);

        return new CicloformativoResource($cicloFormativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Cicloformativo  $cicloFormativo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cicloformativo $cicloFormativo)
    {
        $cicloFormativo->delete();

        $mensaje = ['estado' => 'eliminado'];

        return response()->json($mensaje);
    }
}
