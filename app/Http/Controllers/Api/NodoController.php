<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NodoStoreRequest;
use App\Models\nodo_Model;
use Exception;
use Illuminate\Http\Request;

class NodoController extends Controller
{


    public function index()
    {
        $nodos = nodo_Model::withDepth()
                ->get()
                ->toTree();
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
            
            if($request->parent && $request->parent !== 'none')
            {
                $node = nodo_Model::find($request->parent);
                $node->appendNode($nodo);
            }
        }catch(Exception $ex){

            echo $ex->getMessage();
        }
        
        return \response($nodo);
    }


    public function show(nodo_Model $nodo_Model)
    {
        //
    }


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
    public function destroy(nodo_Model $id)
    {
        try
        {
            nodo_Model::where('id', '=', $id)->delete();
        }
        catch(Exception $ex)
        {
            $bool = $nodo->isDescendantOf($parent);
            if($bool == true)
            {
                echo "no se puede elimar el nodo", $ex->getMessage();
            }
        }
    }
}
