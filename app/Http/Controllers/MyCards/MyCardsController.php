<?php

namespace App\Http\Controllers\MyCards;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MyCardsController extends Controller
{

    public function index()
    {
        $collections = auth()->user()->collections;
        return view('MyCards.index',compact('collections'));
    }

}
