<?php

namespace App\Http\Controllers;

use App\Enums\ServerStatus;
use App\Models\Server;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use View;
class ServerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $servers = Server::all();

        // load the view and pass the sharks
        return View::make('server.index')
            ->with('servers', $servers);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('server.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'ipAddress' => 'required|ip',
            'system' => 'required',
        ]);
        $server=new Server;
        $server->ipAddress=$request->input('ipAddress');
        $server->system=$request->input('system');
        $server->audited=true;
        $server->status=ServerStatus::RESTING;
        $server->save();

        // redirect
        Session::flash('message', 'Successfully created shark!');
        return Redirect::to('admin/servers');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $server= Server::find($id);

        // show the view and pass the shark to it
        return View::make('server.show')
            ->with('server', $server);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $server= Server::find($id);
        // show the edit form and pass the shark
        return View::make('server.edit')
            ->with('server', $server);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'ipAddress' => 'required|ip',
            'system' => 'required',
        ] );
        $server= Server::find($id);

        if($server->status==ServerStatus::RESTING) {
            $server->ipAddress = $request->input('ipAddress');
            $server->system = $request->input('system');
            $server->save();
            // redirect
            Session::flash('message', 'Successfully updated Server !');
            return Redirect::to('admin/servers');
        }


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
