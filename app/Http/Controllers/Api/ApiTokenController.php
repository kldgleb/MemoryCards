<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;

/**
     * @OA\Info(
     *      version="1.0.0",
     *      title="MemoryCards API Documentation",
     *      description="",
     *      @OA\Contact(
     *          email="gleb.koldunov@gmail.com"
     *      ),
     *      
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Demo API Server"
     * )
     * 
     * @OA\SecurityScheme(
     *  type="apiKey",
     *  in="query",
     *  name="api_token",
     *  securityScheme="api_token"
     * )
     * 
     * @OA\Tag(
     * name="Collection",
     * description="ways to interact with collection objects"
     * )
     * 
     * @OA\Tag(
     * name="Cards",
     * description="collection has many cards and this how to interact with card objects"
     * )
     * 
     */

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
