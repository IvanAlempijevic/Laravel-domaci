<?php

namespace App\Http\Controllers;

use App\Http\Resources\AutomobilResurs;
use App\Models\Automobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class AutomobilController extends HandleController
{
    public function index()
    {
        $automobili = Automobil::all();
        return $this->success(AutomobilResurs::collection($automobili), 'Vraceni su svi automobili.');
    }


    public function store(Request $request)
    {
        $input = $request->all();
        $validator = Validator::make($input, [
            'markaID' => 'required',
            'model' => 'required',
            'karoserijaID' => 'required',
            'cena' => 'required',
            'brojVrata' => 'required'
        ]);
        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $automobil = Automobil::create($input);

        return $this->success(new AutomobilResurs($automobil), 'Novi automobil je kreiran.');
    }


    public function show($id)
    {
        $automobil = Automobil::find($id);
        if (is_null($automobil)) {
            return $this->error('Automobil sa zadatim id-em ne postoji.');
        }
        return $this->success(new AutomobilResurs($automobil), 'Automobil sa zadatim id-em je vracen.');
    }


    public function update(Request $request, $id)
    {
        $automobil = Automobil::find($id);
        if (is_null($automobil)) {
            return $this->error('Automobil sa zadatim id-em ne postoji.');
        }

        $input = $request->all();

        $validator = Validator::make($input, [
            'markaID' => 'required',
            'model' => 'required',
            'karoserijaID' => 'required',
            'cena' => 'required',
            'brojVrata' => 'required'
        ]);

        if($validator->fails()){
            return $this->error($validator->errors());
        }

        $automobil->markaID = $input['markaID'];
        $automobil->model = $input['model'];
        $automobil->karoserijaID = $input['karoserijaID'];
        $automobil->cena = $input['cena'];
        $automobil->brojVrata = $input['brojVrata'];
        $automobil->save();

        return $this->success(new AutomobilResurs($automobil), 'Automobil je azuriran.');
    }

    public function destroy($id)
    {
        $automobil = Automobil::find($id);
        if (is_null($automobil)) {
            return $this->error('Automobil sa zadatim id-em ne postoji.');
        }

        $automobil->delete();
        return $this->success([], 'Automobil je obrisan.');
    }
}
