<?php

namespace App\Http\Controllers;

use App\Enums\ScanEngStatus;
use App\Models\ScanEng;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;
use View;

class ScanEngController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $scanEngs = ScanEng::all();

        // load the view and pass the sharks
        return View::make('scanEngs.index')
            ->with('scanEngs', $scanEngs);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('scanEngs.create');
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
            'port' => 'required|numeric|gt:1024',
        ]);

        $scanEng=new ScanEng;
        $scanEng->ipAddress=$request->input('ipAddress');
        $scanEng->port=$request->input('port');
        $scanEng->status=ScanEngStatus::RESTING;
        $scanEng->save();

        // redirect
        Session::flash('message', 'Successfully created shark!');
        return Redirect::to('admin/scanEngs');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $scanEng= ScanEng::find($id);

        // show the view and pass the shark to it
        return View::make('scanEngs.show')
            ->with('scanEng', $scanEng);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $scanEng= ScanEng::find($id);
        // show the edit form and pass the shark
        return View::make('scanEngs.edit')
            ->with('scanEng', $scanEng);    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {

            $request->validate(['ipAddress' => 'required|ip',
                'port' => 'required|numeric|gt:1024',] );

        // process the login


            // store
            $scanEng = ScanEng::find($id);
            if($scanEng->status==ScanEngStatus::RESTING) {
                $scanEng->ipAddress = $request->input('ipAddress');
                $scanEng->port = $request->input('port');
                $scanEng->save();
                // redirect
                Session::flash('message', 'Successfully updated shark!');
                return Redirect::to('admin/scanEngs');
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
