<?php

namespace App\Http\Controllers\Api;

use App\Http\Requests\CardRequest;
use App\Http\Controllers\Controller;
use App\Models\Collection;
use App\Models\Card;

class CardController extends Controller
{

    /**
     * @OA\Get(
     *      path="{collection_name}/Card",
     *      operationId="getCardsList",
     *      tags={"Card"},
     *      summary="Get list of cards",
     *      description="Returns list of cards",
     *      security={
     *          {"api_token": {}}
     *      },
     *      @OA\Parameter(
     *          name="collection_name",
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
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)->first();
        if($collection){
            return response()->json($collection->cards,200);
        }
        return response('Not Found',404);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CardRequest $request,$collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)->first();
        if($collection){
            Card::create([
                'collection_id' => $collection->id,
                'header' => $request->header,
                'text' => $request->text
            ]);
            return response()->json('Created',201);
        }
        return response('Not Found',404);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($collection_name,$card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){                            
            $card = $collection->cards->get($card_id);
            if($card){
                return response()->json($card,200);
            }
        }
        return response('Not Found',404);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CardRequest $request, $collection_name, $card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){                            
            $card = $collection->cards->get($card_id);
            if($card){
                $card->update($request->validated());
                return response()->json('Updated',200);
            }
        }
        return response('Not Found',404);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($collection_name, $card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){                            
            $card = $collection->cards->get($card_id);
            if($card){
                $card->delete();
                return response()->json('Deleted',200);
            }
        }
        return response('Not Found',404);
    }
}
