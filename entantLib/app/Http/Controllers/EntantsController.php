<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Entant;
use App\ContactInfo;
use App\Direction;

class EntantsController extends Controller
{

	public function index(){
		return view('main_info', ['answer' => Entant::get(),]);
	}

    public function create(){
    	return view('addEntant', ['answer' => Entant::get(), 'subjects' => Direction::get(),]);
    }

    public function store(Request $request){
    	//dump($request);
    	$entant = Entant::create($request->only('name', 'secondname', 'lastname', 'dbirth', 'danger'));

    	$entant->information()->create($request->only('country', 'city', 'phone', 'email'));
    	//$entant->direction()->create($request->only(['direction_id']));
    }
}
