<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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

        return view('index.addCard',compact('collection'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  App\Http\Requests\CollectionRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CollectionRequest $request)
    {
        Collection::create($request->validated());

        return redirect()->route('addCard',$request->collection_name);
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

        return redirect()->route('index');
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
        $card = $cards->get($card_id-1);
        if($card){
        return view('index.show',[
            'collection'=>$collection,
            'card'=>$card
        ]);
        }
        else{
        return view('index.showEnd',compact('collection'));
        } 
    }
}
