<?php

namespace App\Rules;

class PhoneNumberUniqueRule extends BaseUniqueRule
{
    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return $this->getIsOldValue($value) || !$this->model->where('phone_number', $value)->exists();
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Phone number is exist.';
    }
}
