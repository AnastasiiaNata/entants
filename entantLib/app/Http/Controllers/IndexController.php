<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

//use App\Http\Requests;

use App\Entant;
use App\Direction;

class IndexController extends Controller
{
    public function index(){
    	return view('start_page');
    }

    public function showEntants(){
    	return view('entants');
    }

    /*public function mainInfo(){
    	$answer = Entant::all();

    	$subjects = Direction::all();
    	return view('main_info')->with(['answer' => $answer, 'subjects' => $subjects]);
    }*/
}
