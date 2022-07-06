<?php

namespace App\Http\Controllers;

use App\Models\PlayBook;
use Illuminate\Http\Request;
use App\Models\Regex;
use App\Models\Expretion;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

use View;
class RegexController extends Controller
{
public function index(){
    $regexs= Regex::all();

    // load the view and pass the sharks
    return View::make('regex.index')
        ->with('regexs', $regexs);
}

public function create(){
    $playbooks=PlayBook::all();

    // load the view and pass the sharks
    return View::make('regex.create')->with(["playbooks"=>$playbooks]);
}
public function store(Request $request)
    {

        $regex=new Regex;
        $regex->playbook_id=$request->input('playbook_id');
        $regex->save();

        foreach ($request->input('expretions') as $key => $expretion) {
            $expretionObject=new Expretion;
            $expretionObject->regex_id=$regex->id;
            $expretionObject->order=$key;
            $expretionObject->expretion=$expretion;
            $expretionObject->save();
        }
        Session::flash('message', 'Successfully created shark!');
        return Redirect::to('admin/regex');
    }
    public function show ($id){
        $regex= Regex::find($id);
        return View::make('regex.show')
            ->with('regex', $regex);
    }

}
