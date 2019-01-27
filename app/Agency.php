<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{

    protected $fillable = [
        'user_id','name','description','address','mobile1', 'mobile2', 'landline1', 'landline2', 'fax'
    ];

    public function user()
    {
        return $this->belongsTo('User');
    }

    public function packages() {
        return $this->hasMany('App\Package');
    }
}
