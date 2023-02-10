<?php

namespace App\Repositories;

use App\Models\marvy\TblGame;
use Illuminate\Database\Eloquent\Model;

class GameRepository extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * get model
     * @return Model
     */
    public function getModel(): Model
    {
        return new TblGame();
    }
}
