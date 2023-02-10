<?php

namespace App\Repositories;

use App\Models\marvy\TblUserGame;
use Illuminate\Database\Eloquent\Model;

class UserGameRepository extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * get model
     * @return Model
     */
    public function getModel(): Model
    {
        return new TblUserGame();
    }
}
