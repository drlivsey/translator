<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Language extends Model
{
    public function algorithms()
    {
    	return $this->hasMany('App\Code');
    }

    static public function GetAlgorithms(Language $language)
    {
    	$fromcache = \Cache::get($language->name.'_algorithms', []);
    	if($fromcache == null)
		    return \Cache::remember($language->name.'_algorithms',  900,  
		        function() use ($language) {
		            return $language->algorithms;
		        });
		else
			return $fromcache;
    }
}
