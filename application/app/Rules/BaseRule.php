<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use Illuminate\Database\Eloquent\Builder;

class BaseRule implements Rule
{
    /**
     * @var string
     */
    protected string $message;

    /**
     * @var Builder|null
     */
    protected $model;

    public function __construct($model = null)
    {
        $this->model = $model;
        $this->message = '';
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param string $attribute
     * @param mixed $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return $this->message;
    }

    /**
     * Is unique
     *
     * @param $model
     * @param $params
     * @return bool
     */
    protected function isUnique($model, $params): bool
    {
        return !$model->where([
            $params
        ])->exists();
    }
}
