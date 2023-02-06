<?php

namespace App\Http\Controllers;

use App\Models\Pasiens;
use App\Http\Requests\StorePasiensRequest;
use App\Http\Requests\UpdatePasiensRequest;

class PasiensController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorePasiensRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorePasiensRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function show(Pasiens $pasiens)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function edit(Pasiens $pasiens)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatePasiensRequest  $request
     * @param  \App\Models\Pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatePasiensRequest $request, Pasiens $pasiens)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pasiens  $pasiens
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pasiens $pasiens)
    {
        //
    }
}
