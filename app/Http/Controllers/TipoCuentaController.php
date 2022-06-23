<?php

namespace App\Http\Controllers;

use App\Models\TipoCuenta;
use Illuminate\Http\Request;

class TipoCuentaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return TipoCuenta::all();
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        return TipoCuenta::create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function show(TipoCuenta $tipoCuenta)
    {
        return TipoCuenta::find($id);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function edit(TipoCuenta $tipoCuenta)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TipoCuenta $tipoCuenta)
    {
        $tipoCuenta = TipoCuenta::findOrFail($id);
            $tipoCuenta->update($request->all());
            return $tipoCuenta;
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TipoCuenta  $tipoCuenta
     * @return \Illuminate\Http\Response
     */
    public function destroy(TipoCuenta $tipoCuenta)
    {
        $tipoCuenta=TipoCuenta::findOrFail($id); 
         $tipoCuenta->delete();
       return $tipoCuenta ;
    }
}
