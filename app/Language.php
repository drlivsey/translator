<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function algorithms()
    {
    	return $this->hasMany('App\Code');
    }
}
