<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\PrestamosComponente;
use Illuminate\Http\Request;
use App\Http\Resources\PrestamosComponenteResource;
use App\Models\Componente;
use App\Models\Prestamo;
use Hamcrest\Arrays\IsArray;

class PrestamosComponenteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return PrestamosComponenteResource::collection(PrestamosComponente::paginate());
    }

    /*public function insertarComponentes(Request $request){
        return json_encode('hola');
        $data = json_decode($request->getContent(), true);
        if(is_array($data['n_series_componentes'])){
            $idPrestamo = $data['idPrestamo'];
            $n_series = $data['n_series_componentes'];
            $componentes = [];
            foreach($n_series as $n_serie){
                $componentes[] = Componente::where('n_serie', $n_serie);
            }
            $prestamosComponente = PrestamosComponente::where('prestamo_id', $idPrestamo);

            for($i = 0; $i < sizeof($prestamosComponente); ++$i){
                for($j = 0; $j < sizeof($componentes); ++$j){
                    if($prestamosComponente[$i]->tipo_componente_id === $componentes[$j]->tipo_componente_id){
                        $prestamosComponente[$i]->componente_id = $componentes[$j]->componente_id;
                    }
                }
            }
        }
    }*/

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

        return new PrestamosComponenteResource($prestamosComponente);
    }

    public function porPrestamoId(Request $request, $id){
        $data = json_decode($request->getContent(), true);
        $idOrdenador = isset($data['idOrdenador']) ? $data['idOrdenador'] : null;
        $idMonitor = isset($data['idMonitor']) ? $data['idMonitor'] : null;

        $prestamosComponentes = PrestamosComponente::where('prestamo_id', $id)->get();

        if(!is_null($idOrdenador)){
            $ordenador = Componente::findOrFail($idOrdenador);

            foreach($prestamosComponentes as $prestamoComponente){
                if($prestamoComponente->tipo_componente_id === $ordenador->tipo_componente_id){
                    $prestamoComponente->componente_id = $ordenador->componente_id;
                    $ordenador->disponible = 0;

                    $ordenador->save();
                    $prestamoComponente->save();
                }
            }
        }

        if(!is_null($idMonitor)){
            $monitor = Componente::findOrFail($idMonitor);

            foreach($prestamosComponentes as $prestamoComponente){
                if($prestamoComponente->tipo_componente_id === $monitor->tipo_componente_id){
                    $prestamoComponente->componente_id = $monitor->componente_id;
                    $monitor->disponible = 0;
                    
                    $monitor->save();
                    $prestamoComponente->save();
                }
            }
        }

        return PrestamosComponenteResource::collection($prestamosComponentes);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PrestamosComponente  $prestamosComponente
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $prestamosComponente = PrestamosComponente::findOrFail($id);
        return new PrestamosComponenteResource($prestamosComponente);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PrestamosComponente  $prestamosComponente
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $prestamosComponenteData = json_decode($request->getContent(), true);

        $prestamosComponente = PrestamosComponente::findOrFail($id);
        $prestamosComponente->update($prestamosComponenteData);

        return new PrestamosComponenteResource($prestamosComponente);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PrestamosComponente  $prestamosComponente
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $prestamosComponente = PrestamosComponente::findOrFail($id);

        $prestamosComponente->delete();

        $mensaje = ['estado' => 'eliminado'];

        return response()->json($mensaje);
    }
}
