<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Package extends Model
{
    protected $fillable = [
        'agency_id','name','description','activities','price', 'location_id',
        'photo1', 'photo2', 'photo3', 'photo4', 'photo5'
    ];

}
