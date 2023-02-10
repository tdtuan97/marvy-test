<?php

namespace App\Http\Requests\User;

use App\Http\Requests\ApiRequest;
use App\Models\marvy\TblUser;
use App\Rules\PhoneNumberUniqueRule;

class UserCreateRequest extends ApiRequest
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
            'full_name'    => ['required', 'max:255', 'string'],
            'phone_number' => ['required', 'max:50', new PhoneNumberUniqueRule(new TblUser())],
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
            'full_name.required'       => __('validation.required', ['attribute' => __('common.first_name')]),
            'full_name.max'            => __('validation.max.string', ['attribute' => __('common.first_name')]),
            'full_name.string'         => __('validation.string', ['attribute' => __('common.first_name')]),
            'phone_number.required'     => __('validation.required', ['attribute' => __('common.phone_number')]),
            'phone_number.max'          => __('validation.max.string', ['attribute' => __('common.phone_number')]),
        ];
    }
}
