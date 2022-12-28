<?php

namespace App\Http\Controllers;

use App\Http\Resources\MarkaResurs;
use App\Models\Marka;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class MarkaController extends HandleController
{
    public function index()
    {
        $marke = Marka::all();
        return $this->success(MarkaResurs::collection($marke), 'Vracene su sve marke.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'marka' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $marka = Marka::create($input);

        return $this->success(new MarkaResurs($marka), 'Nova marka je kreirana.');
    }


    public function show($id)
    {
        $marka = Marka::find($id);
        if (is_null($marka)) {
            return $this->error('Marka sa zadatim id-em ne postoji.');
        }
        return $this->success(new MarkaResurs($marka), 'Marka sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $marka = Marka::find($id);
        if (is_null($marka)) {
            return $this->error('Marka sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'marka' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $marka->marka = $input['marka'];
        $marka->save();

        return $this->success(new MarkaResurs($marka), 'Marka je azurirana.');
    }

    public function destroy($id)
    {
        $marka = Marka::find($id);
        if (is_null($marka)) {
            return $this->error('Marka sa zadatim id-em ne postoji.');
        }

        $marka->delete();
        return $this->success([], 'Marka je obrisana.');
    }
}
