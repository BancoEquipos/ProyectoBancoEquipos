<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PrestamosComponente;
use Illuminate\Http\Request;
use App\Http\Resources\PrestamosComponenteResource;

class PrestamosComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PrestamosComponente::collection(PrestamosComponente::paginate());
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
     * @param  \App\Models\PrestamosComponente  $prestamosComponente
     * @return \Illuminate\Http\Response
     */
    public function show(PrestamosComponente $prestamosComponente)
    {
        return new PrestamosComponenteResource($prestamosComponente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrestamosComponente  $prestamosComponente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PrestamosComponente $prestamosComponente)
    {
        $prestamosComponenteData = json_decode($request->getContent(), true);

        $prestamosComponente->update($prestamosComponenteData);

        return new PrestamosComponenteResource($prestamosComponente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrestamosComponente  $prestamosComponente
     * @return \Illuminate\Http\Response
     */
    public function destroy(PrestamosComponente $prestamosComponente)
    {
        $prestamosComponente->delete();

        $mensaje = ['estado' => 'eliminado'];

        return response()->json($mensaje);
    }
}
