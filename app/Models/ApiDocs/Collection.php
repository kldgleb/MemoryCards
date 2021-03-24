<?php

namespace App\Models\ApiDocs;

/**
 * @OA\Schema(
 *     title="Collection",
 *     description="Collection model",
 *     @OA\Xml(
 *         name="Collection"
 *     )
 * )
 */

class Collection
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
*      title="user_id",
*      description="User who create this collection",
*      example="1"
* )
* @var int
*/   
private $user_id;


/** 
* @OA\Property(
*      title="collection_name",
*      description="Name of the colelction",
*      example="Example Name"
* )
* @var string
*/
private $collection_name;


/** 
* @OA\Property(
*      title="collection_description",
*      description="Description of the colelction",
*      example="Not required"
* )
*
* @var string
*/
private $collection_description;


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
