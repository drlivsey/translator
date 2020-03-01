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
		return view('home', [ 'articles' => $articles,]);
	}
}
