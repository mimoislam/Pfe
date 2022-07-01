<?php

namespace App\Http\Controllers;

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

        return  View::make('server.index')
            ->with([
                'credentials'=> $credentials,
            ]);;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        

        return  View::make('server.adduser')
            ->with([
                'server_id'=> $id,
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

        ]);

        $cred=new Credential;
        $cred->username=$request->input('username');
        $cred->password=$request->input('password');
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
    
        Session::flash('message', 'Successfully updated!');
        return Redirect::to('admin/servers');
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
            return Redirect::to('admin/servers');
    }
}


