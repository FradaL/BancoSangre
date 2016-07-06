<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Yajra\Oci8\Eloquent\OracleEloquent as Eloquent;

class Donor extends Model
{
    //

    protected $table = 'Donors';
    public $sequence = 'donors_id_seq';
    protected $fillable = ['id', 'first_name', 'second_name', 'first_lastname', 'second_lastname', 'dpi', 'Civil_Status', 'gender', 'phone', 'age', 'BloodType_id', 'weight', 'disease', 'tattoo', 'Status_Check'];


    public function bloodtypes()
    {
        return $this->belongsTo('App\BloodType', 'bloodtype_id');

    }


    public function getNameAttribute(){
        return ($this->first_name . " " . $this->second_name . " " .
            $this->first_lastname . " ". $this->second_lastname);
    }

    public function scopeSearchDpi($query, $dpi)
    {
        if (trim($dpi) != "")
        {
            return $query->where('DPI', $dpi);
        }
    }

    public function scopeSearchBlood($query, $bloodtype_id)
    {
        if (trim($bloodtype_id) != "")
        {
            return $query->where('bloodtype_id', $bloodtype_id);
        }
    }

    public function scopeGroupAge($query, $check)
    {
        if (trim($check) == true)
        {
            $query = DB::table('donors')
                ->join('bloodtypes', 'donors.bloodtype_id', '=', 'bloodtypes.id')
                ->select('gender', 'age', DB::raw('MAX(bloodtypes.name) as name'), DB::raw('count(*) as Total'), DB::raw('MAX(bloodtype_id) as bloodtype_id'))
                ->groupBy('age', 'gender')
                ->get();

            $query = collect($query);
            return $query;
        }
    }



}