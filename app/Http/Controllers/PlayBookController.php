<?php

namespace App\Http\Controllers;

use App\Models\PlayBook;
use App\Http\Requests\StorePlayBookRequest;
use App\Http\Requests\UpdatePlayBookRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use View;
class PlayBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $playbooks = playBook::all();

        // load the view and pass the sharks
        return View::make('playBook.index')
            ->with('playbooks', $playbooks);
    }

    /**
     * Show the form for creating a new resource.
     *
     *
     * StorePlayBookRequest is used to check for the data u can use it when ever u want
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

        return View::make('playbook.create');

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlayBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayBookRequest $request)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation


        // process the login

            // store
            $shark = new PlayBook;
            $shark->name       = $request->input('name');
            $shark->system      = $request->input('system');
            $shark->githubUrl      = $request->input('githubUrl');
            $shark->user_id      = Auth::user()->id;
            $shark->description = $request->input('description');
            $shark->save();

            // redirect
            Session::flash('message', 'Successfully created shark!');
            return Redirect::to('admin/playbooks');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlayBook  $playBook
     * @return \Illuminate\Http\Response
     */
    public function show( $id)
    {

        // get the shark
        $playbook= PlayBook::find($id);

        // show the view and pass the shark to it
        return View::make('playbook.show')
            ->with('playbook', $playbook);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlayBook  $playBook
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $playbook= Playbook::find($id);

        // show the edit form and pass the shark
        return View::make('playbook.edit')
            ->with('playbook', $playbook);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayBookRequest  $request
     * @param  \App\Models\PlayBook  $playBook
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // validate
        // read more on validation at http://laravel.com/docs/validation
        $rules = array(
            'name'       => 'required',
            'system'       => 'required',
            'githubUrl'       => 'required',
            'description'       => 'required',
        );
        $request->validate($rules);
            // store
            $shark = PlayBook::find($id);
            $shark->name       = $request->input('name');
            $shark->system      = $request->input('system');
            $shark->githubUrl      = $request->input('githubUrl');
            $shark->description = $request->input('description');
            $shark->save();

            // redirect
            Session::flash('message', 'Successfully updated shark!');
            return Redirect::to('admin/playbooks');

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PlayBook  $playBook
     * @return \Illuminate\Http\Response
     */
    public function destroy(PlayBook $playBook)
    {
        //
    }
}
