<?php

namespace App\Http\Controllers;

use App\BloodType;
use App\Config;
use App\Donor;
use App\Freezer;
use App\Unit;
use App\WareHouse;
use Illuminate\Http\Request;
use App\Http\Controllers\Excel;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;
use Mockery\CountValidator\Exception;

class UnitController extends Controller
{
    public function index()
    {

        $bloodtype = BloodType::all()->toArray();

        foreach ($bloodtype as $key => $val) //key es mi subindice del array, $val contiene el valor de ese subindice
        {
            $bloodtype[$key]['unit'] = Unit::where('BloodType_id', $val['id'])->where('type', 'Entrada')->sum('quantity');
            $out = Unit::where('BloodType_id', $val['id'])->where('type', 'Salida')->sum('quantity');
            $bloodtype[$key]['unit'] = $bloodtype[$key]['unit'] - $out;

        }

        return view('unit.units', compact('bloodtype'));
    }


    public function newUnit()
    {
        $donor = Donor::lists('id', 'id');
        $freezer = Freezer::lists('name', 'id');
        $warehouse = WareHouse::lists('name', 'id');
        return view('unit.new', compact('donor', 'warehouse', 'freezer'));
    }

    public function newCreate(Request $request)
    {
        $data = $request->all();
        try{
            for ($x = 1; $x < count($data['donor_id']); $x++) {
                $unit = new Unit();
                $donor = Donor::where('id', $data['donor_id'][$x])->where('status_check', 'Aprobado')->where('status_delete', 'Activo')->first();

                if(empty($donor)){
                    Session::flash('Sucesful', '¡El Código del Donador es Incorrecto, Verifiqué que no se encuentre Inactivo!');
                }
                else{
                    $unit->quantity = $data['quantity'][$x];
                    $unit->donor_id = $data['donor_id'][$x];
                    $unit->BloodType_id = $donor->bloodtype_id;
                    $unit->freezer_id = $data['freezer_id'][$x - 1];
                    $config = Config::all()->first();
                    $unit->price = $config->price;
                    $unit->type = 'Entrada';
                    $unit->save();
                }
            }
        }
        catch(\Exception $e){
            Session::flash('Sucesful', '¡Ah Ocurrido un Error !' + $e);
        }
        return redirect()->route('unit.list');
    }


    public function create()
    {
        $bloodtype = BloodType::lists('name', 'id');
        $freezer = Freezer::where('status_delete', 'Activo')->lists('name','id');

        return view('unit.dispatch', compact('bloodtype', 'freezer'));
    }

    public function store(Request $request)
    {
        $data = $request->all();

        for ($x = 1; $x < count($data['BloodType_id']); $x++) {
            $blood = Unit::where('BloodType_id', $data['BloodType_id'][$x])->where('type', 'Entrada')->sum('quantity');
            $resto = Unit::where('BloodType_id', $data['BloodType_id'][$x])->where('type', 'Salida')->sum('quantity');
            $blood = $blood - $resto;
            $blood = $blood - $data['quantity'][$x];
            if ($blood >= 0) {
                //dd('si entra' + ($blood));
                $unit = new Unit();
                $unit->bloodtype_id = $data['BloodType_id'][$x];
                $unit->freezer_id = $data['freezer_id'][$x];
                $unit->quantity = $data['quantity'][$x];
                $config = Config::all()->first();
                if ($data['type_transc'] == 'Venta') {
                    $unit->price = $config->price;
                } else {
                    $unit->price = 0;
                }
                $unit->type = 'Salida';
                $unit->type_transc = $data['type_transc'];
                $unit->save();
            } else {
                Session::flash('Sucesful', '¡No Existen Suficientes Unidades!');
            }
        }
        return redirect()->route('unit.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function example($id)
    {
        $export = Donor::select('id', 'first_name', 'second_name', 'first_lastname', 'second_lastname',
                                'dpi', 'phone', 'email')->where('bloodtype_id',$id)->get();
        \Excel::create('Donantes Activos', function ($excel) use($export) {
            $excel->sheet('Hoja 1', function ($sheet) use($export) {
                $sheet->fromArray($export);
            });
        })->export('xls');
    }
}


