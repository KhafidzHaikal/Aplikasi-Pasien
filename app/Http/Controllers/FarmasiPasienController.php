<?php

namespace App\Http\Controllers;

use App\Models\FarmasiPasien;
use App\Http\Requests\StoreFarmasiPasienRequest;
use App\Http\Requests\UpdateFarmasiPasienRequest;

class FarmasiPasienController extends Controller
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
     * @param  \App\Http\Requests\StoreFarmasiPasienRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFarmasiPasienRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function show(FarmasiPasien $farmasiPasien)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function edit(FarmasiPasien $farmasiPasien)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFarmasiPasienRequest  $request
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFarmasiPasienRequest $request, FarmasiPasien $farmasiPasien)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\FarmasiPasien  $farmasiPasien
     * @return \Illuminate\Http\Response
     */
    public function destroy(FarmasiPasien $farmasiPasien)
    {
        //
    }
}
