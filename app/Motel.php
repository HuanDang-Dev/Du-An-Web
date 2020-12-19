<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Motel extends Model
{
    use Sluggable;
    protected $table = "motels";

    public function user(){
    	return $this->belongsTo('App\User','user_id','id');
    }

    public function district(){
    	return $this->belongsTo('App\District','district_id','id');
    }

    public function reports(){
        return $this->hasMany('App\Reports','id_motelroom','id');
    }

    public function sluggable()
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
