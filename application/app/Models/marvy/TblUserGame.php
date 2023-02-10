<?php

namespace App\Models\marvy;

use App\Models\BaseModel;

class TblUserGame extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_user_game';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'user_id',
        'game_id',
        'point',
        'created_at',
        'created_user',
        'updated_at',
        'updated_user',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'updated_at' => 'datetime',
    ];

    /**
     * Belongs to game
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function game(){
        return $this->belongsTo(TblGame::class, 'game_id', 'id');
    }

    /**
     * Accessor game_name
     * @return string
     */
    public function getGameNameAttribute()
    {
        if(!$this->relationLoaded('game')){
            $this->load('game');
        }

        return $this->game ? $this->game->name : '';
    }
}
