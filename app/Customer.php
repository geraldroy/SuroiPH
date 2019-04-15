<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{

    protected $fillable = [
        'user_id',
        'name_last','name_first', 'name_middle', 'name_suffix',
        'address_street1', 'address_street2', 'address_barangay', 'address_mun_city', 'address_province',
        'mobile', 'birthday', 'photo'
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }
}
