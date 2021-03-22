<?php

namespace App\Http\Controllers\MyCardsEdit;

use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Models\Card;
use App\Models\Collection;

class MyCardsEditCardController extends Controller
{
    
    public function editCard($collection_name, $card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        $card = $collection->cards->get($card_id);
        if($collection){
            if($card){    
                return view('MyCardsEdit.editCard',[
                    'collection' => $collection,
                    'card' => $card,
                    'card_id' => $card_id
                ]);
            }else{
            return view('MyCardsEdit.editEnd',compact('collection'));
            }
        }else return abort('404');   
    }

    public function createCard($collection_name){
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            return view('MyCardsEdit.createCard',[
                'collection' => $collection
            ]);
        }else return abort('404');

    }

    public function storeCard(CardRequest $request, $collection_name){
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
        Card::create([
            'collection_id' => $collection->id,
            'header' => $request->header,
            'text' => $request->text
        ]);
        }else abort('404');

        return redirect()->route('MyCardsEdit.editCard',[$collection_name,0]);
    }

    public function updateCard(CardRequest $request, $collection_name, $card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
                                   
        $card = $collection->cards->get($card_id);
        if($card){
            $card->update($request->validated());
        }else abort('404');
        
        return redirect()->route('MyCardsEdit.editCard',[$collection_name,$card_id]);
    }

    public function destroyCard($collection_name, $card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        
        $card = $collection->cards->get($card_id);
        if($card){
        $card->delete();
        }else abort('404');
        return redirect()->route('MyCardsEdit.editCard',[$collection_name,$card_id-1]);
    }
}
