<?php

namespace App\Http\Resources;

use App\Models\Karoserija;
use App\Models\Marka;
use Illuminate\Http\Resources\Json\JsonResource;

class AutomobilResurs extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        $karoserija = Karoserija::find($this->karoserijaID);
        $marka = Marka::find($this->markaID);

        return [
            'id' => $this->id,
            'markaID' => $marka->marka,
            'model' => $this->model,
            'karoserijaID' => $karoserija->karoserija,
            'cena' => $this->cena,
            'brojVrata' => $this->brojVrata
        ];
    }
}
