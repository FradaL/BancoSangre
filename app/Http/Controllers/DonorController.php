<?php

namespace App\Http\Controllers;

use App\BloodType;
use App\Donor;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class DonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    protected $edadMin = 18;
    protected $edadMax = 65;
    protected $pesoMin = 50;
    protected $aux = 'Reprobado';

    public function index(Request $request)
    {
        $blood = BloodType::lists('name', 'id');
        $lists = Donor::SearchDpi($request->get('dpi'))->SearchBlood($request->get('bloodtype_id'))->orderby('id', 'ASC')->paginate();
        if (Input::get('check'))
        {
            $lists = Donor::GroupAge($request->get('check'));
            return view ('donantes.group', compact('lists', 'blood'));
        }
        else{
            return view('donantes.donor', compact('lists', 'blood'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $BloodTypes = BloodType::all()->pluck('name','id');
        return view ('donantes.new', compact('BloodTypes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */

    public function store(Requests\CreateDonorRequest $request)
    {
        if ($request['age'] > $this->edadMin and $request['age'] < $this->edadMax ){
            if($request['weight'] > $this->pesoMin){
                if($request['disease'] == 'NO'){
                    if($request['tattoo'] == 'NO') {
                        $this->aux = 'Aprobado';
                    }
                }
            }
        }

        $sequence = DB::getSequence();
        $request['id'] = $sequence->nextValue('donors_id_seq');
        $request['Status_Check'] = $this->aux;
        $request['status_delete'] = 'Activo';
        Donor::create($request->all());
        Session::flash('Sucesful', '¡El Donante con DPI No.: ' .  $request->dpi . ' Ha sido Creado!');
        return redirect()->route('list.donor');
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
        $donor = Donor::findOrFail($id);
        $BloodTypes = BloodType::lists('name', 'id');

        return view('donantes.edit', compact('donor', 'BloodTypes'));
    }


    public function update(Request $request, $id)
    {
        $donor = Donor::findOrFail($id);
        $donor->fill($request->all());
        if ($donor->age > $this->edadMin and $donor->age < $this->edadMax ){
            if($donor->weight > $this->pesoMin){
                if($donor->disease == 'NO'){
                    if($donor->tattoo == 'NO'){
                        $this->aux = 'Aprobado';
                    }
                }
            }
        }
        $donor->Status_Check = $this->aux;
        $donor->save();

        Session::flash('Sucesful', '¡El Donante con DPI No.: ' .  $donor->dpi . ' Ha sido Actualizado!');
        return redirect()->route('list.donor');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->status_delete = "Inactivo";
        $donor->save();

        Session::flash('Sucesful', '¡El Donante con DPI No.: ' .  $donor->dpi . ' Está Inactivo Ahora!');
        return redirect()->route('list.donor');
    }

    public function activate($id)
    {
        $donor = Donor::findOrFail($id);
        $donor->status_delete = "Activo";
        $donor->save();

        Session::flash('Sucesful', '¡El Donante con DPI No.: ' .  $donor->dpi . ' Ha sido Activado!');
        return redirect()->route('list.donor');
    }
}
