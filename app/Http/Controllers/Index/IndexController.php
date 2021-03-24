<?php

namespace App\Http\Controllers\Index;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CardRequest;
use App\Http\Requests\CollectionRequest;
use App\Models\Card;
use App\Models\Collection;

class IndexController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = Collection::latest()->paginate(6);
        return view('index.index',compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function addCard(Collection $collection)
    {
        $cards = $collection->cards;
        return view('index.addCard',[
            'collection'=>$collection,
            'cards'=>$cards]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {
        $collection_path = $this->toCamelCase($request->collection_name);
        Collection::create([
            'user_id'=>auth()->user()->id,
            'collection_name'=>$request->collection_name,
            'collection_path'=> $collection_path,
            'collection_description'=>$request->collection_description,
        ]);

        return redirect()->route('addCard',$collection_path);
    }
    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CardRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function storeCard(CardRequest $request, Collection $collection)
    {
        Card::create([
            'collection_id' => $collection->id,
            'header' => $request->header,
            'text' => $request->text
        ]);

        return redirect()->route('addCard',$collection->collection_path);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Collection $collection, $card_id)
    {
        $cards = $collection->cards;
        $card = $cards->get($card_id);
        if($card){
        return view('index.show',[
            'collection'=>$collection,
            'card'=>$card,
            'card_id'=>$card_id
        ]);
        }
        else{
        return view('index.showEnd',compact('collection'));
        } 
    }
}
