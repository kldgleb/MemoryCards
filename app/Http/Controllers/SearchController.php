<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Collection;

class SearchController extends Controller
{     
    public function index(Request $request){
        $collections = Collection::where('collection_name', 'like',"%$request->q%")
                                    ->orWhere('collection_description','like',"%$request->q%")->paginate(15);
        //where('tag')
        return view('search.index',['collections'=>$collections]);
    }
}
