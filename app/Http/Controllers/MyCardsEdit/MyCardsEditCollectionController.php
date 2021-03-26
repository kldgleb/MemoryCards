<?php

namespace App\Http\Controllers\MyCardsEdit;

use App\Http\Controllers\Controller;
use App\Http\Requests\CollectionRequest;
use App\Models\Collection;

class MyCardsEditCollectionController extends Controller
{
    public function index()
    {
        $collections = auth()->user()->collections;
        return view('MyCardsEdit.index',compact('collections'));
    }

    public function editCollection($collection_path)
    {
        $collection = Collection::where('collection_path', $collection_path)
                                    ->where('user_id',auth()->user()->id)->first();
        
        if($collection){
            return view('MyCardsEdit.editCollection',[
                'collection' => $collection
            ]);
        }else abort('404');
    }

    public function updateCollection(CollectionRequest $request, $collection_path)
    {
        $collection = Collection::where('collection_path', $collection_path)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            $collection->update([
                'collection_name'=>$request->collection_name,
                'collection_path'=>$this->toCamelCase($request->collection_name),
                'collection_description'=>$request->collection_decription,
                ]);
        }else abort('404');
        return redirect()->route('MyCardsEdit.index');
        
    }

    public function destroyCollection($collection_path)
    {
        $collection = Collection::where('collection_path', $collection_path)
                                    ->where('user_id',auth()->user()->id)->first();
        $cards = $collection->cards;
        foreach($cards as $card){
            $card->delete();
        }
        $collection->delete();
        return redirect()->route('MyCardsEdit.index');
    }
}
