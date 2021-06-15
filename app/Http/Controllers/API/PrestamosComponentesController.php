<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PrestamosComponentes;
use Illuminate\Http\Request;
use App\Http\Resources\PrestamosComponentesResource;

class PrestamosComponentesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PrestamosComponentesResource::collection(PrestamosComponentes::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $prestamosComponenteData = json_decode($request->getContent(), true);

        $prestamosComponente = PrestamosComponente::create($prestamosComponenteData);

        return new PrestamosComponenteResource($prestamosComponenteData);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrestamosComponentes  $prestamosComponentes
     * @return \Illuminate\Http\Response
     */
    public function show(PrestamosComponentes $prestamosComponentes)
    {
        return new PrestamosComponenteResource($prestamosComponentes);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrestamosComponentes  $prestamosComponentes
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrestamosComponentes $prestamosComponentes)
    {
        $prestamosComponenteData = json_decode($request->getContent(), true);

        $prestamosComponentes->update($prestamosComponenteData);

        return new PrestamosComponenteResource($prestamosComponentes);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrestamosComponentes  $prestamosComponentes
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrestamosComponentes $prestamosComponentes)
    {
        $prestamosComponentes->delete();

        $mensaje = ['estado' => 'eliminado'];

        return response()->json($mensaje);
    }
}
