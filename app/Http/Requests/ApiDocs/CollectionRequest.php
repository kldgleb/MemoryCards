<?php

namespace App\Http\Requests\ApiDocs;

/**
 * @OA\Schema(
 *      title="CollectionRequest",
 *      description="Store Collection request body data",
 *      type="object",
 *      required={"collection_name"}
 * )
 */

class CollectionRequest
{
    /**
     * @OA\Property(
     *      title="collection_name",
     *      description="Name of the collection",
     *      example="Example Collection"
     * )
     *
     * @var string
     */
    public $collection_name;
    /**
     * @OA\Property(
     *      title="collection_description",
     *      description="Description of the collection",
     *      example="Example Collection description"
     * )
     *
     * @var string
     */
    public $collection_description;

}
