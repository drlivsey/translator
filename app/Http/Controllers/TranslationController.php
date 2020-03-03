<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Auth;
use \Illuminate\Support\HtmlString;
use App\Code;
use App\Language;

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
    	$language = Language::find($request->radio_l);
    	$algorithms = Language::GetAlgorithms($language);
    	$regexp = "/<([\w]+)>/";
    	$comands = explode(',', $request->editor);
    	$var_names = [];
    	$result = [];
    	foreach ($comands as $comand) {
    		preg_match_all($regexp, $comand, $match);
    		for ($i = 0; $i < count($match[0]); $i++) {
    			$word = trim(str_ireplace($match[0][$i], '', $comand));
    			$code = $algorithms->where('word', $word)->first();
    			if($code != null)
    				$result[] = new HtmlString(str_ireplace('_', $match[1][$i], $code->code).' <span style="color:green">'.$code->comment.'</span><br>');
    			else
    				return Redirect::back()->with('syntax_error', $word)->withInput();
    		}
    	}
    	return Redirect::back()->with('syntax', $result)->withInput();
    }

}
