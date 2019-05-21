<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class TransactionStatus extends Model
{

    public $table = 'transaction_statuses';

    protected $fillable = [
        'transaction_id', 'status', 'user_id', 'remarks'
    ];
}
