<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CicloFormativoResource extends JsonResource
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
            "id" => $this->id,
            "nombre" => $this->nombre,
            //"siglas" => $this->siglas,
        ];
    }
}
