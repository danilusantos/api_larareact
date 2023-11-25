<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Produto;
use App\Http\Resources\ProdutoResource;
use App\Http\Resources\ProdutoResourceCollection;
use App\Services\ResponseService;
use Illuminate\Http\Request;

class ProdutoController extends Controller
{
   /*
    * Display all resource in storage.
    */
    public function index()
    {
        return ProdutoResource::collection(Produto::all());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        try{
            $produto = Produto::create($request->all());
            return response()->json($produto, 201);
        } catch (Exception $e){
            return ResponseService::exception('produtos.store',null,$e);
        }

        return new ProdutoResource($produto,array('type' => 'store','route' => 'produtos.store'));
    }

    /**
     * Display the specified resource.
     */
    public function show(Produto $produto)
    {
        return new ProdutoResource($produto, array('type' => 'show', 'route' => 'produtos.show'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Produto $produto)
    {
        try{
            $produto->update($request->all());
            return response()->json($produto, 200);
        } catch(Exception $e){
            return ResponseService::exception('produtos.update',null,$e);
        }

        return new ProdutoResource($produto,array('type' => 'update','route' => 'produtos.update'));

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Produto $produto)
    {
        try{
            $produto->delete();
            return response()->json(null, 204);
        } catch(Exception $e){
            return ResponseService::exception('produtos.destroy',null,$e);
        }

        return new ProdutoResource($produto,array('type' => 'destroy','route' => 'produtos.destroy'));

    }
}
