<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Card",
 *     description="Card model",
 *     @OA\Xml(
 *         name="Card"
 *     )
 * )
 */

class Card extends Model
{
/**
* @OA\Property(
*      title="id",
*      description="id",
*      example="1"
* )
* @var int
*/   
//protected $id;

/**
* @OA\Property(
*      title="collection_id",
*      description="Card belongs to collection",
*      example="1"
* )
* @var int
*/   
//protected $collection_id;


/** 
* @OA\Property(
*      title="header",
*      description="Header of the card",
*      example="Example Header"
* )
* @var string
*/
//protected $header;


/** 
* @OA\Property(
*      title="text",
*      description="text of the card",
*      example="Example card text"
* )
*
* @var string
*/
//protected $text;


/** 
* @OA\Property(
*      title="created_at",
*      description="creation time",
*      example="2021-03-23 10:31:54"
* )
*
* @var string
*/
//protected $created_at;


/** 
* @OA\Property(
*      title="updated_at",
*      description="update time",
*      example="2021-03-24 10:31:54"
* )
*
* @var string
*/
//protected $updated_at;


    use HasFactory;

    protected $fillable = ['collection_id','header','text']; 
}
