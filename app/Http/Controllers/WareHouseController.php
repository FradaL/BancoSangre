<?php

namespace App\Http\Controllers;

use App\WareHouse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class WareHouseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $warehouse = WareHouse::get();
        return view ('warehouse.list', compact('warehouse'));
    }


    public function create()
    {
        return view('warehouse.new');
    }


    public function store(Requests\warehouseRequest $request)
    {
        //
        $sequence = DB::getSequence();
        $data = new WareHouse();
        $data->id = $sequence->nextValue('warehouses_id_seq');
        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->status_delete = 'Activo';
        $data->save();

        Session::flash('Sucesful', '¡Se ha Creado el Almacen con Exito!');
        return redirect()->route('warehouse.list');
    }


    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $warehouse = WareHouse::find($id);
        return view('warehouse.edit', compact('warehouse'));
    }

    public function update(Requests\EditWareHouseRequest $request, $id)
    {
        $warehouse = WareHouse::find($id);
        $warehouse->name = $request->input('name');
        $warehouse->address = $request->input('address');
        $warehouse->save();

        Session::flash('Sucesful', '¡Se ha Actualizado el Almacen con Exito!');
        return redirect()->route('warehouse.list');
    }

    public function activate($id)
    {
        $warehouse = WareHouse::findOrFail($id);
        $warehouse->status_delete = 'Activo';
        $warehouse->save();

        Session::flash('Sucesful', '¡Se ha Activado el Almacen con Exito!');
        return redirect()->route('warehouse.list');

    }

    public function destroy($id)
    {
        $warehouse = WareHouse::findOrFail($id);
        $warehouse->status_delete = 'Inactivo';
        $warehouse->save();

        Session::flash('Sucesful', '¡Se ha Desactivado el Almacen con Exito!');
        return redirect()->route('warehouse.list');
    }
}
