<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CollectionRequest;
use App\Models\Collection;

class MyCardsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $collections = auth()->user()->collections;
        return view('MyCards.index',compact('collections'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //EXCEPT
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //EXCEPT
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
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
        }else{
            abort('404');
        }
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function editCard($collection_name,$card_id)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        $card = $collection->cards->get($card_id);
        if($collection){
        return view('MyCards.edit',[
            'collection' => $collection,
            'cards' => $cards,
            'card' => $card
        ]);
        }else{
            abort('404');
        }
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CollectionRequest $request, $collection_name)
    {
        $collection = Collection::where('collection_name', $collection_name)
                                    ->where('user_id',auth()->user()->id)->first();
        if($collection){
            $collection->update($request->validated());
            return redirect()->route('MyCards.index');
        }else{
            abort('404');
        }
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
