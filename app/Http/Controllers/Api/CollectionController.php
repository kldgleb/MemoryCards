<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CollectionRequest;
use App\Http\Controllers\Controller;
use App\Models\Collection;

class CollectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = auth()->user()->collections;

        return response()->json($collections,200);
    }

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
            'collection_description'=>$request->collection_description,
        ]);
        return response('Created',201);
    }

    /**
     * Display the specified resource.
     *
     * @param  string  $collection_name
     * @return \Illuminate\Http\Response
     */
    public function show($collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            return response()->json($collection,200);
        }
        return response('Not Found',404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  App\Http\Requests\CollectionRequest  $request
     * @param  string  $collection_name
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, $collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            $collection->update($request->validated());
            return response('Updated',200);
        }
        return response('Not Found',404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $collection_name
     * @return \Illuminate\Http\Response
     */
    public function destroy($collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            $collection->delete();
            return response('Deleted',200);
        }
        return response('Not Found',404);
    }
}
