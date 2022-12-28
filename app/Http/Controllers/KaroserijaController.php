<?php

namespace App\Http\Controllers;

use App\Http\Resources\KaroserijaResurs;
use App\Models\Karoserija;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class KaroserijaController extends HandleController
{
    public function index()
    {
        $karoserije = Karoserija::all();
        return $this->success(KaroserijaResurs::collection($karoserije), 'Vracene su sve karoserije.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'karoserija' => 'required',
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $karoserija = Karoserija::create($input);

        return $this->success(new KaroserijaResurs($karoserija), 'Nova karoserija je kreirana.');
    }


    public function show($id)
    {
        $karoserija = Karoserija::find($id);
        if (is_null($karoserija)) {
            return $this->error('Karoserija sa zadatim id-em ne postoji.');
        }
        return $this->success(new KaroserijaResurs($karoserija), 'Karoserija sa zadatim id-em je vracena.');
    }


    public function update(Request $request, $id)
    {
        $karoserija = Karoserija::find($id);
        if (is_null($karoserija)) {
            return $this->error('Karoserija sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'karoserija' => 'required',
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $karoserija->karoserija = $input['karoserija'];
        $karoserija->save();

        return $this->success(new KaroserijaResurs($karoserija), 'Karoserija je azurirana.');
    }

    public function destroy($id)
    {
        $karoserija = Karoserija::find($id);
        if (is_null($karoserija)) {
            return $this->error('Karoserija sa zadatim id-em ne postoji.');
        }

        $karoserija->delete();
        return $this->success([], 'Karoserija je obrisana.');
    }
}
