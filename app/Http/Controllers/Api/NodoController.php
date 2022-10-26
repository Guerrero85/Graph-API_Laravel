<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\NodoStoreRequest;
use App\Models\nodo_Model;
use Exception;
use Illuminate\Http\Request;

/**
 * @OA\Info(title="API nodo", version="1.0")
 *
 * @OA\Server(url="http://127.0.0.1:8000/")
 */

class NodoController extends Controller
{
    /**
     * @OA\Get(
     *     path="/api/nodo",
     *     summary="Mostrar nodo",
     *     @OA\Response(
     *         response=200,
     *         description="Mostrar todos los nodo."
     *     ),
     *     @OA\Response(
     *         response="default",
     *         description="Ha ocurrido un error."
     *     )
     * )
     */

    public function index()
    {
        $nodos = nodo_Model::withDepth()
            ->get()
            ->toTree();
        return \response($nodos);
    }

    /**
     *   @OA\Post(
     *   path="/api/nodo",
     *   summary="Store Nodo",
     *   description="Store Node",
     *   operationId="parent_id",
     *   tags={"default"},
     *   @OA\RequestBody(
     *      required=true,
     *      description="crear nodo",
     *      @OA\JsonContent(
     *         required={"parent","title"},
     *         @OA\Property(property="parent", type="int", format="number", example="0"),
     *         @OA\Property(property="title", type="string", format="text", example="title"),
     *      ),
     *   ),
     *   @OA\Response(
     *      response=422,
     *      description="Wrong credentials response",
     *
     *          )
     *       )
     *   )
     */

    public function store(NodoStoreRequest $request)
    {
        $nodo = new nodo_Model();
        try {
            $nodo->parent = $request['parent'];
            $nodo->title = $request['title'];

            $nodo->save();

            if ($request->parent && $request->parent !== 'none') {
                $node = nodo_Model::find($request->parent);
                $node->appendNode($nodo);
            }
        } catch (Exception $ex) {

            echo $ex->getMessage();
        }

        return \response($nodo);
    }


    /**
     * @OA\Delete(
     *      path="/api/nodo/{id}",
     *      operationId="deletenodo",
     *      tags={"default"},
     *      summary="Delete existing node",
     *      description="Deletes a record and returns no content",
     *      @OA\Parameter(
     *          name="id",
     *          description="Nodo id",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="integer"
     *          )
     *      ),
     *      @OA\Response(
     *          response=204,
     *          description="Successful operation",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Resource Not Found"
     *      )
     * )
     */
    public function destroy($id)
    {
        try {
            $node = nodo_Model::find($id);
            $node->delete();

            return "El nodo se ha eliminado";
        } catch (Exception $ex) {

            return "El nodo no se ha eliminado " . $ex->getMessage();
        }
    }
}
