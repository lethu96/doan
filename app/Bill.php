<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Bill extends Model
{
    protected $table = 'bill';
    public $timestamps = false;
    protected $guarded =[];

    public function user()
    {
        return $this->belongsTo('App\User','user_id');
    }
    public function bill_detail()
    {
        return $this->hasMany('App\BillDetail','bill_id');
    }
}
