<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'header', 'author', 'article',
    ];

    public static function GetNews()
    {
    	$fromcache = \Cache::get('posts', []);
		if($fromcache == null)
			return \Cache::remember('posts', 900, function() {
				return Article::all();
			});
		else
			return $fromcache;
    }
}
