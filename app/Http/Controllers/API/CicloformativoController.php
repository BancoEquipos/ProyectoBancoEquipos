<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use app\Http\Resources\CicloformativoResource;
use App\Models\Cicloformativo;
use Illuminate\Http\Request;

class CicloformativoController extends Controller
{

    public function index()
    {
        return CicloformativoResource::collection(Cicloformativo::paginate());
    }

    public function store(Request $request)
    {
        $cicloData = json_decode($request->getContent(), true);

        $ciclo = Cicloformativo::create($cicloData);

        return new CicloformativoResource($ciclo);
    }

    public function show($id)
    {
        $cicloFormativo = Cicloformativo::findOrFail($id);
        return new CicloformativoResource($cicloFormativo);
    }

    public function update(Request $request, $id)
    {
        $cicloFormativoData = json_decode($request->getContent(), true);
        $cicloFormativo = Cicloformativo::findOrFail($id);
        $cicloFormativo->update($cicloFormativoData);

        return new CicloformativoResource($cicloFormativo);
    }

    public function destroy($id)
    {
        $cicloFormativo = Cicloformativo::findOrFail($id);
        $cicloFormativo->delete();

        $mensaje = ['estado' => 'eliminado'];

        return response()->json($mensaje);
    }
}
