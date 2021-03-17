<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CollectionRequest;
use App\Http\Requests\CardRequest;
use App\Models\Collection;

class MyCardsController extends Controller
{
    /**
     * Display a list of the collections of cards.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = auth()->user()->collections;
        return view('MyCards.index',compact('collections'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //EXCEPT
    }

    /**
     * Show the form for editing Collection.
     *
     * @param  string $collection_name
     * @return \Illuminate\Http\Response
     */
    public function edit($collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        
        if($collection){
            return view('MyCards.edit',[
                'collection' => $collection
            ]);
        }else abort('404');
    }
    /**
     * Show the form for editing Card.
     *
     * @param  string  $collection_name 
     * @param  int  $card_id 
     * @return \Illuminate\Http\Response
     */
    public function editCard($collection_name, $card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        $card = $collection->cards->get($card_id);
        if($collection){
            if($card){    
                return view('MyCards.editCard',[
                    'collection' => $collection,
                    'card' => $card,
                    'card_id' => $card_id
                ]);
            }else{
            return view('MyCards.editEnd',compact('collection'));
            }
        }else return abort('404');   
    }

    /**
     * Update the Colection in storage.
     *
     * @param  \App\Http\Requests\CollectionRequest  $request
     * @param  string  $collection_name
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, $collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            $collection->update($request->validated());
        }else abort('404');
        return redirect()->route('MyCards.index');
        
    }
    /**
     * Update the Card resource in storage.
     *
     * @param  \App\Http\Requests\CardRequest  $request
     * @param  string  $collection_name
     * @param  int  $card_id
     * @return \Illuminate\Http\Response
     */
    public function updateCard(CardRequest $request, $collection_name, $card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
                                   
        $card = $collection->cards->get($card_id);
        if($card){
            $card->update($request->validated());
        }else abort('404');
        
        return redirect()->route('MyCards.editCard',[$collection_name,$card_id]);
    }

    /**
     * Remove the Collection resource from storage.
     *
     * @param  string  $collection_name
     * @return \Illuminate\Http\Response
     */
    public function destroy($collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        $cards = $collection->cards;
        foreach($cards as $card){
            $card->delete();
        }
        $collection->delete();
        return redirect()->route('MyCards.index');
    }
    /**
     * Remove the Card resource from storage.
     *
     * @param  string  $collection_name
     * @param  int  $card_id
     * @return \Illuminate\Http\Response
     */
    public function destroyCard($collection_name, $card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        
        $card = $collection->cards->get($card_id);
        if($card){
        $card->delete();
        }else abort('404');
        return redirect()->route('MyCards.editCard',[$collection_name,$card_id-1]);
    }
}
