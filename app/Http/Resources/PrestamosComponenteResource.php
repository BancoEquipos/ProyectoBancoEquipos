<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class PrestamosComponenteResource extends JsonResource
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
            'activo' => $this->activo,
            'componente_id' => $this->componente_id,
            'prestamo_id' => $this->prestamo_id,
            'tipo_componente_id' => $this->tipo_componente_id,
        ];
    }
}
