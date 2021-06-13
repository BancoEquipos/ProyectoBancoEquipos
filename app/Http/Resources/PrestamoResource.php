<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrestamoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        //return parent::toArray($request);

        return [
            "curso" => $this->curso,
            "profesor_valida" => $this->profesor_valida,
            "fecha_validacion" => $this->fecha_validacion,
            "fecha_devolucion" => $this->fecha_devolucion,
            "fecha_entrega" => $this->fecha_entrega,
            "fecha_alta_solicitud" => $this->fecha_alta_solicitud,
            "alumno" => $this->alumno,
            "tipo_componente" => $this->tipocomponente,
            "motivo" => $this->motivo,
            "domicilio" => $this->domicilio,
            "ciclo_formativo" => $this->ciclo_formativo,
        ];
    }
}
