<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;

class TranslationController extends Controller
{
    //
    public function showWorkspace()
    {
    	if(!Auth::check())
    		return redirect('login')->with('header', 'LOGIN FIRSTLY'); 
    	return view('working');
    }

    public function GetCode(Request $request)
    {
    	$regexp = '/array˂[a-z]˃/';
    	$comands = explode(',', $request->editor);
    	//foreach ($comands as $comand) {
    		$result = preg_match_all($regexp, $comands[0], $match);
    	//}
    	return $result;
    }

}
