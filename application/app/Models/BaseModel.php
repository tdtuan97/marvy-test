<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;

class BaseModel extends Model
{
    /**
     * Scope by username
     *
     * @param Builder $query
     * @return Builder
     */
    public function scopeSimple(Builder $query): Builder
    {
        return $query->select('*');
    }
}
