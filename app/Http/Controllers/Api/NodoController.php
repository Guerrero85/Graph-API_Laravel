<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NodoStoreRequest;
use App\Models\nodo_Model;
use Cassandra\Exception\ExecutionException;
use Exception;
use GuzzleHttp\Promise\Create;
use GuzzleHttp\Psr7\Message;
use Illuminate\Http\Request;
use Psy\ExecutionLoopClosure;

class NodoController extends Controller
{

    public function index()
    {
        $nodos = nodo_Model::all();
        return \response($nodos);

    }


    public function store(NodoStoreRequest $request)
    {
        $nodo = new nodo_Model();
        try
        {   
            $nodo->parent = $request['parent'];
            $nodo->title = $request['title'];
            
            $nodo->save(); 
            if($request->parent)
            {
                $node = nodo_Model::find($request->parent);
                $node->appedNode($nodo);
            }
            
        }catch(Exception $ex){

            echo $ex->getMessage();
        }
        
        return \response($nodo);
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
