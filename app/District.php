<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{
    protected $table = 'districts';
    public function motelroom(){
    	return $this->hasMany('App\Motel','district_id','id');
    }
}
