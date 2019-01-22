<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

use Illuminate\Http\Request;

//use App\Http\Requests;

class IndexController extends Controller
{
    public function index(){
    	return view('start_page');
    }

    public function showEntants(){
    	return view('entants');
    }

    public function mainInfo(){

    	$answer = DB::table('entant')->get();
    	$subjects = DB::table('direction')->get();
    	//dump($answer);

    	return view('main_info')->with(['answer' => $answer, 'subjects' => $subjects]);
    }

    public function additional($id_entant){
    	$answer = DB::table('contactInfo')
    		->join('entant', 'contactInfo.entant_id', '=', 'entant.entant_id')
    		->select('contactInfo.entant_id', 'entant.name', 'entant.lastname', 'contactInfo.country', 'contactInfo.city', 'contactInfo.phone', 'contactInfo.email')
    		->groupBy('contactInfo.entant_id')
    		->get();

    	$addiArr = DB::table('contactInfo')
    		->join('entant', 'contactInfo.entant_id', '=', 'entant.entant_id')
    		->select('contactInfo.country', 'contactInfo.city', 'contactInfo.phone', 'contactInfo.email')
    		->where('contactInfo.entant_id', '=', $id_entant)
    		->get();

    	return view('additional')->with(['answer' => $answer, 'id_entant' => $id_entant, 'addiArr' => $addiArr]);


    }

    public function subjectEntants($id_entant){
    	$subjects = DB::table('direction')->get();

    	$answer = DB::table('directionOfEntant')
    		->join('entant', 'directionOfEntant.entant_id', '=', 'entant.entant_id')
    		->join('direction', 'direction.direction_id', '=', 'directionOfEntant.direction_id')
    		->select('directionOfEntant.id', 'entant.entant_id', 'entant.name', 'entant.lastname', 'direction.nameDir')
    		->orderBy('directionOfEntant.id', 'asc')
    		->get();
    	$editSub = [];

    	$editSub = DB::table('directionOfEntant')
    		->join('entant', 'directionOfEntant.entant_id', '=', 'entant.entant_id')
    		->join('direction', 'direction.direction_id', '=', 'directionOfEntant.direction_id')
    		->select('direction.direction_id', 'entant.entant_id', 'entant.name', 'entant.lastname', 'direction.nameDir')
    		//->orderBy('directionOfEntant.id', 'asc')
    		->where('entant.entant_id', '=', $id_entant)
    		->get();
    	
    	//dump($editSub);
    	//dump($id_entant);
    	$nameS = [];

    	foreach ($editSub as $sub) {
    		$nameS[$sub->direction_id] = $sub->direction_id;
    		$nameS['name'] = $sub->name;
    		$nameS['lastname'] = $sub->lastname;
    	}

    	$lenNameS = count($editSub);
    	//dump($lenNameS);

    	return view('subjectEntants')->with(['answer' => $answer, 'id_entant' => $id_entant, 'subjects' => $subjects, 'nameS' => $nameS, 'lenNameS' => $lenNameS]);
    }

    public function subjects($id_direction){
    	$answer = DB::table('direction')->get();

    	if ($id_direction > 0){
	    	$directions = DB::table('direction')
	    		->select('direction.nameDir')
	    		->where('direction.direction_id', '=', $id_direction)
	    		->get();

	    	return view('listSubjects')->with(['answer' => $answer, 'id_direction' => $id_direction, 'directions' => $directions]);
	    }
	    else {
	    	return view('listSubjects')->with(['answer' => $answer, 'id_direction' => $id_direction]);
	    }

    }

    public function addEntant(){
    	$subjects = DB::table('direction')->get();
    	$answer = DB::table('entant')->get();

    	return view('addEntant')->with(['subjects'=>$subjects, 'answer'=>$answer]);
    }


    public function editMainEntant($id_entant){
    	$subjects = DB::table('direction')->get();
    	$answer = DB::table('entant')->get();

    	$main_entant = DB::table('entant')
    		->select('entant.*')
    		->where('entant.entant_id', '=', $id_entant)
    		->get();
    	

    	return view('editMainInfo')->with(['subjects'=>$subjects, 'answer'=>$answer, 'id_entant' => $id_entant, 'main_entant' => $main_entant]);
    }

    public function entantEditStore(Request $request, $id_entant){
    	//dump($id_entant);
    	$this->validate($request, [
    		'name' => 'required',
    		'secondname' => 'required',
    		'lastname' => 'required'
    	]);
    	//dump($request);

    	DB::table('entant')
    		->where('entant.entant_id', '=', $id_entant)
    		->update(['entant.name' => $request->name, 'entant.secondname' => $request->secondname, 'entant.lastname' => $request->lastname, 'entant.dbirth' => $request->dbirth, 'entant.danger' => $request->danger]);

    	return redirect('entants/main_info');
    }


    public function entantEditAddiStore(Request $request, $id_entant){
    	$this->validate($request, [
    		'country' => 'required',
    		'city' => 'required',
    		'phone' => 'required',
    		'email' => 'required'
    	]);

    	//dump($request);

    	DB::table('contactInfo')
    		->where('contactInfo.entant_id', '=', $id_entant)
    		->update(['contactInfo.country' => $request->country, 'contactInfo.city' => $request->city, 'contactInfo.phone' => $request->phone, 'contactInfo.email' => $request->email]);
    	return redirect('entants/');
    }

    public function SubEditStore(Request $request, $id_entant, $lenNameS){
    	DB::table('directionOfEntant')
			->where('entant_id', '=', $id_entant)
			->delete();

		foreach ($request->nameDir as $req) {
    		DB::table('directionOfEntant')->insert(['direction_id' => $req, 'entant_id' => $id_entant]);
    	}
		

    	return redirect('entants');
    }


    public function store(Request $request){
    	//dump($request->all());

    	$this->validate($request, [
    		'name' => 'required',
    		'secondname' => 'required',
    		'lastname' => 'required',
    		'country' => 'required',
    		'city' => 'required',
    		'phone' => 'required',
    		'email' => 'required',
    		'nameDir' => 'required'
    	]);

    	DB::table('entant')->insert(
    		['name' => $request->name, 'secondname' => $request->secondname, 'lastname' => $request->lastname, 'danger' => $request->danger, 'dbirth' => $request->dbirth]
    	);

    	$answer_id = DB::table('entant')
    		->select('entant_id')
    		->where('name', '=', $request->name)
    		->first();

    	DB::table('contactInfo')->insert(
    		['entant_id' => $answer_id->entant_id, 'country' => $request->country, 'city' => $request->city, 'phone' => $request->phone, 'email' => $request->email]
    	);

    	foreach ($request->nameDir as $name) {
    		DB::table('directionOfEntant')->insert(
    			['direction_id' => $name, 'entant_id' => $answer_id->entant_id]
    		);
    	}

    	return redirect('entants/main_info');
    	
    }


    public function DirStore(Request $request){
    	$this->validate($request, [
    		'nameDir' => 'required',
    	]);

    	DB::table('direction')->insert(
    		['nameDir' => $request->nameDir]
    	);
    	return redirect('/');
    }

    public function DirEditStore(Request $request, $id_direction){
    	$this->validate($request, [
    		'nameDir' => 'required',
    	]);

    	DB::table('direction')
    		->where('direction.direction_id', '=', $id_direction)
    		->update(['direction.nameDir' => $request->nameDir]);
    	return redirect('/');
    }


}
