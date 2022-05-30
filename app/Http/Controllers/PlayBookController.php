<?php

namespace App\Http\Controllers;

use App\Models\PlayBook;
use App\Http\Requests\StorePlayBookRequest;
use App\Http\Requests\UpdatePlayBookRequest;

class PlayBookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        return PlayBook::all();
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePlayBookRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePlayBookRequest $request)
    {


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PlayBook  $playBook
     * @return \Illuminate\Http\Response
     */
    public function show(PlayBook $playBook)
    {


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PlayBook  $playBook
     * @return \Illuminate\Http\Response
     */
    public function edit(PlayBook $playBook)
    {


    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePlayBookRequest  $request
     * @param  \App\Models\PlayBook  $playBook
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePlayBookRequest $request, PlayBook $playBook)
    {



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
