<?php

namespace App\Models\marvy;

use App\Models\BaseModel;

class TblUser extends BaseModel
{
    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'tbl_user';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',
        'full_name',
        'phone_number',
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
     * Has many userGames
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function userGames(){
        return $this->hasMany(TblUserGame::class, 'user_id', 'id');
    }
}
