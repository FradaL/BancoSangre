<?php

namespace App\Http\Controllers;

use App\Freezer;
use App\WareHouse;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;

class FreezerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $freezer = Freezer::get();
        return view ('freezer.list', compact('freezer'));
    }


    public function create()
    {

        $warehouse = WareHouse::lists('name','id');
        return view('freezer.new', compact('warehouse'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Requests\FreezerRequest $request)
    {
        //
        $sequence = DB::getSequence();
        $data = new Freezer;
        $data->id = $sequence->nextValue('freezers_id_seq');
        $data->name = $request->input('name');
        $data->address = $request->input('address');
        $data->WareHouse_id = $request->input('WareHouse_id');
        $data->status_delete = 'Activo';
        $data->save();

        Session::flash('Sucesful', '¡Se ha Creado el Congelador con Exito!');
        return redirect()->route('freezer.list');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $warehouse = WareHouse::lists('name','id');
        $freezer = Freezer::find($id);
        return view('freezer.edit', compact('freezer', 'warehouse'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Requests\EditFreezerRequest $request, $id)
    {
        //
        $freezer = Freezer::findOrFail($id);
        $freezer->name = $request->input('name');
        $freezer->address = $request->input('address');
        $freezer->WareHouse_id = $request->input('WareHouse_id');
        $freezer->save();

        Session::flash('Sucesful', '¡Se ha Actualizado el Congelador con Exito!');
        return redirect()->route('freezer.list');
    }

    public function activate($id)
    {
        $freezer = Freezer::find($id);
        $freezer->status_delete = 'Activo';
        $freezer->save();

        Session::flash('Sucesful', '¡Se ha Activado el Congelador con Exito!');
        return redirect()->route('freezer.list');

    }
    public function destroy($id)
    {
        //
        $freezer = Freezer::find($id);
        $freezer->status_delete = 'Inactivo';
        $freezer->save();

        Session::flash('Sucesful', '¡Se ha Desactivado el Congelador con Exito!');
        return redirect()->route('freezer.list');
    }
}
