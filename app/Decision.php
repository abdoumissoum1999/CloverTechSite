<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Decision extends Model
{
    protected $fillable=['title','content','user_id','wilaya_id'];



    public function wilaya(){
        return $this->belongsTo('App\Wilaya');

    }


    public function user(){
        return $this->belongsTo('App\User');

    }
}
