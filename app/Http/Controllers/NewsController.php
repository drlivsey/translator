<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Article;
use Illuminate\Support\Facades\Auth;

class NewsController extends Controller
{
	public function ShowNews()
	{
		$articles = Article::GetNews();
		if(Auth::check())
			$auth = true;
		else
			$auth = false;
		return view('home', [ 'articles' => $articles, 'auth' => $auth]);
	}
}
