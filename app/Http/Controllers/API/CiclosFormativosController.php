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
     * @param  \App\Models\CiclosFormativos  $ciclosFormativos
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $cicloFormativo = Cicloformativo::findOrFail($id);
        return new CicloformativoResource($cicloFormativo);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\CiclosFormativos  $ciclosFormativos
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $cicloFormativoData = json_decode($request->getContent(), true);
        $cicloFormativo = Cicloformativo::findOrFail($id);
        $cicloFormativo->update($cicloFormativoData);

        return new CicloformativoResource($cicloFormativo);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\CiclosFormativos  $ciclosFormativos
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cicloFormativo = Cicloformativo::findOrFail($id);
        $cicloFormativo->delete();

        $mensaje = ['estado' => 'eliminado'];

        return response()->json($mensaje);
    }
}
