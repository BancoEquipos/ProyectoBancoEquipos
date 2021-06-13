<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class AlumnoResource extends JsonResource
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
            'id' => $this->id,
            'nre' => $this->nre,
            'nombre' => $this->nombre,
            'apellidos' => $this->apellidos,
            'nif' => $this->nif,
            'email' => $this->email,
            'telefono' => $this->telefono,
            'prestamos' => $this->prestamos,
        ];
    }
}
