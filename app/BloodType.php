<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BloodType extends Model
{
    //
    protected $table = 'BloodTypes';

    protected $fillable = ['name'];

    public function donors()
    {
        return $this->hasMany('App\Donor', 'bloodtype_id', 'id');
    }


    public static function getQuantityClass(){
        $bloodtype = BloodType::all()->toArray();
        foreach($bloodtype as $key => $val)
        {
            $bloodtype[$key]['unit']= Unit::where('BloodType_id', $val['id'])->where('type','Entrada')->sum('quantity');
            $out = Unit::where('BloodType_id', $val['id'])->where('type','Salida')->sum('quantity');
            $bloodtype[$key]['unit'] = $bloodtype[$key]['unit']  - $out;
            $class = "";
            if( $bloodtype[$key]['unit'] <= $bloodtype[$key]['reservation']){
                $class = "red-qty";
            }
            return $class;
        }

    }
}
