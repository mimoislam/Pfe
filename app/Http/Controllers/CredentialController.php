<?php

namespace App\Http\Controllers;

use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use App\Models\Credential;
use Illuminate\Support\Facades\Session;
use View;

class CredentialController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $credentials = Credential::all();

        return  View::make('credential.index')
            ->with([
                'credentials'=> $credentials,
            ]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $servers=Server::all();

        return  View::make('server.adduser')
            ->with([
                'servers'=> $servers,
            ]);;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreCredentialRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'server_id' => 'required|numeric',
            'privilege' => 'required',

        ]);

        $cred=new Credential;
        $cred->username=$request->input('username');
        $cred->password=$request->input('password');
        $cred->privilege=$request->input('privilege');
        $cred->server_id = $request->input('server_id');
        $cred->save();
        Session::flash('message', 'Credential Successfully added');
        return Redirect::to('admin/servers');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Credential  $credential
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return  $server= Credential::where('server_id',$id)->get();

        // show the view and pass the shark to it

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Credential  $credential
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $credentials= Credential::find($id);

        // show the edit form and pass the shark
        return View::make('server.editcredentials')
            ->with('credentials', $credentials);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateCredentialRequest  $request
     * @param  \App\Models\Credential  $credential
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

        $request->validate([
            'username' => 'required',
            'password' => 'required',


        ]);


    $cred = Credential::where('id',$id)->update([
        'username'=>$request->username,
        'password'=>$request->password]);
        $cred = Credential::find($id);
        Session::flash('message', 'Successfully updated!');
        return Redirect::to('admin/servers/'.$cred->server_id.'/edit');
    }



    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Credential  $credential
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

        $cred = Credential::find($id);

        $cred->delete();
            Session::flash('message', 'User Successfully deleted!');
            return Redirect::to('admin/servers/'.$cred->server_id.'/edit');
    }
}


