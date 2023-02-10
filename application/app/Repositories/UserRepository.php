<?php

namespace App\Repositories;

use App\Models\marvy\TblUser;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Arr;

class UserRepository extends BaseRepository implements BaseRepositoryInterface
{
    /**
     * get model
     * @return Model
     */
    public function getModel(): Model
    {
        return new TblUser();
    }

    /**
     * Paginate
     * @param array $queries
     * @return mixed
     */
    public function paginate(array $queries = [])
    {
        $default_limit  = config('paginate.default.per_page');
        $default_page   = config('paginate.default.page');
        $default_prefix = config('paginate.default.prefix');
        $limit          = (int)Arr::get($queries, 'limit', $default_limit);
        $page           = (int)Arr::get($queries, 'page', $default_page);
        $order          = Arr::get($queries, 'order');
        $sort           = Arr::get($queries, 'sort');

        $builder = $this->model;
        if (!empty($sort) && !empty($order)) {
            $order = in_array($order, config('paginate.allow_order')) ? $order
                : config('paginate.default.order');

            $builder = $builder->orderBy($sort, $order);
        }

        return $builder->with(['userGames.game'])->paginate($limit, ['*'], $default_prefix, $page);
    }

    /**
     * Create
     * @param array $attributes
     * @return mixed
     */
    public function create(array $attributes = [])
    {
        return $this->model->create([
            'full_name'    => Arr::get($attributes, 'full_name'),
            'phone_number' => Arr::get($attributes, 'phone_number'),
        ]);
    }

    /**
     * Get one
     * @param int $id
     * @return mixed
     */
    public function find(int $id)
    {
        $item = $this->model->find($id);
        if ($item){
            $item->load('userGames.game');
        }
        return $item;
    }
}
