<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @OA\Schema(
 *     title="Collection",
 *     description="Collection model",
 *     @OA\Xml(
 *         name="Collection"
 *     )
 * )
 */
class Collection extends Model
{
/**
* @OA\Property(
*      title="user_id",
*      description="User who create this collection",
*      example="1"
* )
* @var int
*/   
protected $user_id;


/** 
* @OA\Property(
*      title="collection_name",
*      description="Name of the colelction",
*      example="Example Name"
* )
* @var string
*/
protected $collection_name;


/** 
* @OA\Property(
*      title="collection_description",
*      description="Description of the colelction",
*      example="Not required"
* )
*
* @var string
*/
protected $collection_description;


/** 
* @OA\Property(
*      title="created_at",
*      description="creation time",
*      example="2021-03-23 10:31:54"
* )
*
* @var string
*/
protected $created_at;
/** 
* @OA\Property(
*      title="updated_at",
*      description="update time",
*      example="2021-03-24 10:31:54"
* )
*
* @var string
*/
protected $updated_at;


    use HasFactory;

    protected $fillable = ['user_id','collection_name','collection_description'];

    public function getRouteKeyName(){
        return 'collection_name';
    }

    public function cards(){
        return $this->hasMany(Card::class);
    }
}
