<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

class ApiTokenController extends Controller
{
    public function index(){
        return view('api.index');
    }
    /**
     * Update the authenticated user's API token.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function update(Request $request)
    {
        $token = Str::random(60);
    
        $request->user()->forceFill([
            'api_token' => hash('sha256', $token),
        ])->save();

        return view('api.token',['token'=>$token]);
    }
}
