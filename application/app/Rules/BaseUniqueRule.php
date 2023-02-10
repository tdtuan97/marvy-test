<?php

namespace App\Rules;

class BaseUniqueRule extends BaseRule
{
    protected mixed $withoutValue;

    /**
     * Construct
     *
     * @param $model
     * @param $withoutValue
     */
    public function __construct($model = null, $withoutValue = null)
    {
        parent::__construct($model);
        $this->withoutValue = $withoutValue;
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param $value
     * @return bool
     */
    public function getIsOldValue($value): bool
    {
        return $this->withoutValue === $value;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return '';
    }
}
