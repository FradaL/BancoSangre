<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Unit extends Model
{
    //
    protected $table = 'Units';

    protected $fillable = ['BloodType_id', 'freezer_id', 'donor_id', 'quantity', 'price', 'date', 'type'];




}
