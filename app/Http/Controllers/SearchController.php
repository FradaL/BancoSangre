<?php

namespace App\Http\Controllers;

use App\BloodType;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $blood = BloodType::lists('name','id');
        return view('compatibility.search', compact('blood'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $blood = BloodType::lists('name','id');
        $data = $request->all();
        $group = array(array(
            "O-" => 'Compatible',
            "O+" => 'Compatible',
            "B-" => 'Compatible',
            "B+" => 'Compatible',
            "A-" => 'Compatible',
            "A+" => 'Compatible',
            "AB-" => 'Compatible',
            "AB+" => 'Compatible'
        ), array(
            "O-" => 'Compatible',
            "O+" => '',
            "B-" => 'Compatible',
            "B+" => '',
            "A-" => 'Compatible',
            "A+" => '',
            "AB-" => 'Compatible',
            "AB+" => ''
        ), array(
            "O-" => 'Compatible',
            "O+" => 'Compatible',
            "B-" => '',
            "B+" => '',
            "A-" => 'Compatible',
            "A+" => 'Compatible',
            "AB-" => '',
            "AB+" => ''
        ), array(
            "O-" => 'Compatible',
            "O+" => '',
            "B-" => '',
            "B+" => '',
            "A-" => 'Compatible',
            "A+" => '',
            "AB-" => '',
            "AB+" => ''
        ), array(
            "O-" => 'Compatible',
            "O+" => 'Compatible',
            "B-" => 'Compatible',
            "B+" => 'Compatible',
            "A-" => '',
            "A+" => '',
            "AB-" => '',
            "AB+" => ''
        ), array(
            "O-" => 'Compatible',
            "O+" => '',
            "B-" => 'Compatible',
            "B+" => '',
            "A-" => '',
            "A+" => '',
            "AB-" => '',
            "AB+" => ''
        ),array(
            "O-" => 'Compatible',
            "O+" => 'Compatible',
            "B-" => '',
            "B+" => '',
            "A-" => '',
            "A+" => '',
            "AB-" => '',
            "AB+" => ''
        ), array(
            "O-" => 'Compatible',
            "O+" => '',
            "B-" => '',
            "B+" => '',
            "A-" => '',
            "A+" => '',
            "AB-" => '',
            "AB+" => ''
        ));
        if($data['bloodtype_id'] == 1){
            $group = $group[6];
            $group['name'] = 'O+';
        }
        elseif($data['bloodtype_id'] == 2){
            $group = $group[7];
            $group['name'] = 'O-';
        }elseif($data['bloodtype_id'] == 3){
            $group = $group[2];
            $group['name'] = 'A+';
        }elseif($data['bloodtype_id'] == 4){
            $group = $group[3];
            $group['name'] = 'A-';
        }elseif($data['bloodtype_id'] == 5){
            $group = $group[4];
            $group['name'] = 'B+';
        }elseif($data['bloodtype_id'] == 6){
            $group = $group[5];
            $group['name'] = 'B-';
        }elseif($data['bloodtype_id'] == 7){
            $group = $group[0];
            $group['name'] = 'AB+';
        }elseif($data['bloodtype_id'] == 8){
            $group = $group[1];
            $group['name'] = 'AB-';
        }

        return view('compatibility.search', compact('data', 'group','blood'));
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
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
