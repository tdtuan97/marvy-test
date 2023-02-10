<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Arr;

class BaseResource extends JsonResource
{
    protected     $code;
    protected     $message;
    protected     $errors;
    public static $wrap = 'data';

    public function __construct($code, $resource = null, $errors = [])
    {
        $this->code    = $code;
        $this->message = Arr::get([
            CODE_SUCCESS              => 'OK',
            CODE_BAD_REQUEST          => 'Bad request',
            CODE_UNAUTHENTICATED      => 'Token invalid',
            CODE_FORBIDDEN            => 'Permission denied',
            CODE_NOT_FOUND            => 'Not found',
            CODE_UNPROCESSABLE_ENTITY => 'Data invalid',
            CODE_SERVER_ERROR         => 'Server error',
        ], $code);
        $this->errors  = $errors;
        parent::__construct($resource);
    }

    /**
     * With common field
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            'code'    => $this->code,
            'message' => $this->message,
            'errors'  => $this->errors,
        ];
    }

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'data' => $this->resource
        ];
    }
}
