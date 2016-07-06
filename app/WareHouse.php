<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class WareHouse extends Model
{
    //
    protected $table = 'WareHouses';

    protected $fillable = ['name', 'address'];

    public function freezers()
    {
        return $this->hasMany('App\freezer', 'warehouse_id', 'id');
    }
}
