<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Tipocomponente;
use Illuminate\Http\Request;
use App\Http\Resources\TipocomponenteResource;
use App\Http\Resources\Mate;

class TipocomponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipocomponenteResource::collection(Tipocomponente::paginate());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $datosTipoCompente = json_decode($request->getContent(), true);

        $tipoComponente = Tipocomponente::create($datosTipoCompente);

        return new TipocomponenteResource($tipoComponente);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tipocomponente  $tipoComponente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $tipoComponente = Tipocomponente::findOrFail($id);
        return new TipocomponenteResource($tipoComponente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tipocomponente  $tipoComponente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $tipoComponenteData = json_decode($request->getContent(), true);
        $tipoComponente = Tipocomponente::findOrFail($id);
        $tipoComponente->update($tipoComponenteData);

        return new TipocomponenteResource($tipoComponente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tipocomponente  $tipoComponente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $tipoComponente = Tipocomponente::findOrFail($id);
        $tipoComponente->delete();

        $mensaje = ['estado' => 'eliminado'];

        return response()->json($mensaje);
    }
}
