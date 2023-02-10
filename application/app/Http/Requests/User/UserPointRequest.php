<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;
use App\Models\marvy\TblUser;
use App\Rules\PhoneNumberUniqueRule;

class UserPointRequest extends ApiRequest
{
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
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'point'    => ['required', 'min:0', 'max:1000', 'numeric'],
            'game_id'    => ['required', 'min:1', 'max:999999999', 'numeric'],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'point.required'       => __('validation.required', ['attribute' => __('common.point')]),
            'point.min'            => __('validation.min.numeric', ['attribute' => __('common.point')]),
            'point.max'            => __('validation.max.numeric', ['attribute' => __('common.point')]),
            'point.numeric'         => __('validation.numeric', ['attribute' => __('common.point')]),

            'game_id.required'       => __('validation.required', ['attribute' => __('common.game_id')]),
            'game_id.min'            => __('validation.min.numeric', ['attribute' => __('common.game_id')]),
            'game_id.max'            => __('validation.max.numeric', ['attribute' => __('common.game_id')]),
            'game_id.numeric'         => __('validation.numeric', ['attribute' => __('common.game_id')]),
        ];
    }
}
