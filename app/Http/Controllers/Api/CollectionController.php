<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CollectionRequest;
use App\Http\Controllers\Controller;
use App\Models\Collection;

class CollectionController extends Controller
{
    /**
     * @OA\Get(
     *      path="/collection",
     *      operationId="getCollectionsList",
     *      tags={"Collection"},
     *      summary="Get list of collections",
     *      description="Returns list of colections",
     *      security={
     *          {"api_token": {}}
     *      },
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent(ref="#/components/schemas/Collection")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     *     )
     */

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = auth()->user()->collections;
        if($collections){
            return response()->json($collections,200);
        }
        return response('Not Found',404);
    }

    /**
     * @OA\Post(
     *      path="/collection",
     *      operationId="Store a newly created collection",
     *      tags={"Collection"},
     *      summary="Store new collection",
     *      description="Return status code",
     *      security={
     *          {"api_token": {}}
     *      },
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CollectionRequest")
     *      ),
     *      @OA\Response(
     *          response=201,
     *          description="Created"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      )
     *     )
     */

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {   
        Collection::create([
            'user_id'=>auth()->user()->id,
            'collection_name'=>$request->collection_name,
            'collection_path'=>$this->toCamelCase($request->collection_name),
            'collection_description'=>$request->collection_description,
        ]);
        return response('Created',201);
    }

    /**
     * @OA\Get(
     *      path="/collection/{collection_path}",
     *      operationId="getCollectionByName",
     *      tags={"Collection"},
     *      summary="Get collection",
     *      description="Returns colection",
     *      security={
     *          {"api_token": {}}
     *      },
     *      @OA\Parameter(
     *          name="collection_path",
     *          description="Colelction name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Successful",
     *          @OA\JsonContent(ref="#/components/schemas/Collection")
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     *     )
     */

    /**
     * Display the specified resource.
     *
     * @param  string  $collection_path
     * @return \Illuminate\Http\Response
     */
    public function show($collection_path)
    {
        $collection = Collection::where('collection_path', $collection_path)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            return response()->json($collection,200);
        }
        return response('Not Found',404);
    }

    /**
     * @OA\Patch(
     *      path="/collection/{collection_path}",
     *      operationId="Update collection",
     *      tags={"Collection"},
     *      summary="Update collection",
     *      description="Return status code",
     *      security={
     *          {"api_token": {}}
     *      },
     *      @OA\Parameter(
     *          name="collection_path",
     *          description="Colelction name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\RequestBody(
     *          required=true,
     *          @OA\JsonContent(ref="#/components/schemas/CollectionRequest")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Updated"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     *     )
     */

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CollectionRequest  $request
     * @param  string  $collection_path
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, $collection_path)
    {
        $collection = Collection::where('collection_path', $collection_path)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            $collection->update($request->validated());
            return response('Updated',200);
        }
        return response('Not Found',404);
    }

    /**
     * @OA\Delete(
     *      path="/collection/{collection_path}",
     *      operationId="Delete collection",
     *      tags={"Collection"},
     *      summary="Delete collection",
     *      description="Return status code",
     *      security={
     *          {"api_token": {}}
     *      },
     *      @OA\Parameter(
     *          name="collection_path",
     *          description="Colelction name",
     *          required=true,
     *          in="path",
     *          @OA\Schema(
     *              type="string"
     *          )
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Deleted"
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=404,
     *          description="Not Found"
     *      )
     *     )
     */
    
    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $collection_path
     * @return \Illuminate\Http\Response
     */
    public function destroy($collection_path)
    {
        $collection = Collection::where('collection_path', $collection_path)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            $collection->delete();
            return response('Deleted',200);
        }
        return response('Not Found',404);
    }
}
