<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Freezer extends Model
{
    //

    protected $table = 'freezers';

    protected $fillable = ['name', 'address'];

    public function warehouses()
    {
        return $this->belongsTo('App\WareHouse', 'warehouse_id');

    }
}
