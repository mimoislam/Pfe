<?php

namespace App\Http\Controllers;

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

    // load the view and pass the sharks
    return View::make('regex.create');
}
public function store(Request $request)
    {

        $regex=new Regex;
        $regex->playbook_id=1;
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

}
