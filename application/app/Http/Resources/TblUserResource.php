<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;

class TblUserResource extends BaseResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'full_name'    => $this->full_name,
            'phone_number' => $this->phone_number,
            'created_user' => $this->created_at,
        ];
    }
}
