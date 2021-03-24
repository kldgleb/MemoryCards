<?php

namespace App\Models\ApiDocs;

/**
 * @OA\Schema(
 *     title="Card",
 *     description="card model",
 *     @OA\Xml(
 *         name="Card"
 *     )
 * )
 */
class Card
{
/**
* @OA\Property(
*      title="id",
*      description="id",
*      example="1"
* )
* @var int
*/   
private $id;
/**
* @OA\Property(
*      title="collection_id",
*      description="Card belong to this collection",
*      example="1"
* )
* @var int
*/   
private $collection_id;


/** 
* @OA\Property(
*      title="header",
*      description="Header of the card",
*      example="Example header"
* )
* @var string
*/
private $header;


/** 
* @OA\Property(
*      title="text",
*      description="Text of the card",
*      example="Not required"
* )
*
* @var string
*/
private $text;


/** 
* @OA\Property(
*      title="created_at",
*      description="creation time",
*      example="2021-03-23 10:31:54"
* )
*
* @var string
*/
private $created_at;
/** 
* @OA\Property(
*      title="updated_at",
*      description="update time",
*      example="2021-03-24 10:31:54"
* )
*
* @var string
*/
private $updated_at;

}
