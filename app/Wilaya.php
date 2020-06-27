<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wilaya extends Model
{
    protected $fillable=['name','etat'];


    public  function decision(){

        return $this->hasMany('App\Decision');
    }
    public function user(){
        return $this->belongsTo('App\User');

    }
}
