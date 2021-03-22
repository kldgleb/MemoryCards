<?php

namespace App\Http\Controllers;

use App\Http\Requests\CollectionRequest;
use App\Models\Collection;

class MyCardsEditCollectionController extends Controller
{
    public function index()
    {
        $collections = auth()->user()->collections;
        return view('MyCardsEdit.index',compact('collections'));
    }

    public function editCollection($collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        
        if($collection){
            return view('MyCardsEdit.editCollection',[
                'collection' => $collection
            ]);
        }else abort('404');
    }

    public function updateCollection(CollectionRequest $request, $collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            $collection->update($request->validated());
        }else abort('404');
        return redirect()->route('MyCardsEdit.index');
        
    }

    public function destroyCollection($collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        $cards = $collection->cards;
        foreach($cards as $card){
            $card->delete();
        }
        $collection->delete();
        return redirect()->route('MyCardsEdit.index');
    }
}
