<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NodoStoreRequest;
use App\Models\nodo_Model;
use Illuminate\Http\Request;

class NodoController extends Controller
{

    public function index()
    {
        $nodos = nodo_Model::all();
        return \response($nodos);

    }


    public function store(NodoStoreRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\nodo_Model  $nodo_Model
     * @return \Illuminate\Http\Response
     */
    public function show(nodo_Model $nodo_Model)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\nodo_Model  $nodo_Model
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, nodo_Model $nodo_Model)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\nodo_Model  $nodo_Model
     * @return \Illuminate\Http\Response
     */
    public function destroy(nodo_Model $nodo_Model)
    {
        //
    }
}
