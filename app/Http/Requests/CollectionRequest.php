<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @OA\Schema(
 *      title="CollectionRequest",
 *      description="Store Collection request body data",
 *      type="object",
 *      required={"collection_name"}
 * )
 */

class CollectionRequest extends FormRequest
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

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'collection_name' => 'min:3|max:50|required|unique:collections,collection_name',
            'collection_description' => 'max: 100',
        ];
    }
}
