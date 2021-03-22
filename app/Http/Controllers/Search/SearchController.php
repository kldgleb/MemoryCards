<?php

namespace App\Http\Controllers\Search;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Collection;

class SearchController extends Controller
{     
    public function index(Request $request){
        if($request->q != ''){
        $collections = Collection::where('collection_name', 'like',"%$request->q%")
                                    ->orWhere('collection_description','like',"%$request->q%")->paginate(15);
        //where('tag')
        }else{
        $collections = Collection::where('collection_name',"$request->q")->paginate(15);
        }
        return view('search.index',['collections'=>$collections]);
    }
}
