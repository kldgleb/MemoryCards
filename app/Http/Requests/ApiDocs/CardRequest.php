<?php

namespace App\Http\Requests\ApiDocs;

/**
 * @OA\Schema(
 *      title="CardRequest",
 *      description="Store Card request body data",
 *      type="object",
 *      required={"text","header"}
 * )
 */

class CardRequest
{
    /**
     * @OA\Property(
     *      title="header",
     *      description="header of the collection",
     *      example="Example Card header"
     * )
     *
     * @var string
     */
    private $header;
    /**
     * @OA\Property(
     *      title="text",
     *      description="text of the card",
     *      example="Example Card text"
     * )
     *
     * @var string
     */
    private $text;

}
