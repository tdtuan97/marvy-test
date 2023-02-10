<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\UserCreateRequest;
use App\Http\Requests\User\UserPointRequest;
use App\Repositories\UserRepository;
use App\Repositories\GameRepository;
use App\Repositories\UserGameRepository;
use Illuminate\Support\Facades\Log;
use Throwable;

class UserController extends BaseController
{
    /**
     * Define
     */
    private UserRepository $userRepository;
    private UserGameRepository $userGameRepository;
    private GameRepository $gameRepository;

    /**
     * Init
     */
    public function __construct()
    {
        $this->userRepository     = new UserRepository();
        $this->gameRepository     = new GameRepository();
        $this->userGameRepository = new UserGameRepository();
    }

    /**
     * Index
     * @return array
     */
    public function index()
    {
        $users = $this->userRepository->paginate(request()->all());
        $items = $users->items();
        $data  = [];
        foreach ($items as $item) {
            $data[] = [
                'id'           => $item->id,
                'full_name'    => $item->full_name,
                'phone_number' => $item->phone_number,
                'created_at'   => $item->created_at,
                'user_games'   => $this->parseUserGame($item->userGames)
            ];
        }
        return [
            'data'         => $data,
            'current_page' => $users->currentPage(),
            'total_page'   => $users->lastPage(),
            'per_page'     => $users->perPage(),
            'total'        => $users->total()
        ];
    }

    /**
     * Find one
     * @param $id
     * @return array
     */
    public function find($id)
    {
        $user = $this->userRepository->find($id);
        if (!$user) {
            return [
                'message' => "User [$id] not found."
            ];
        }
        return [
            'id'           => $user->id,
            'full_name'    => $user->full_name,
            'phone_number' => $user->phone_number,
            'created_at'   => $user->created_at,
            'user_games'   => $this->parseUserGame($user->userGames)
        ];
    }

    /**
     * Create
     * @param UserCreateRequest $request
     * @return array
     */
    public function create(UserCreateRequest $request)
    {
        $user = $this->userRepository->create($request->all());
        return $user ? [
            'id'           => $user->id,
            'full_name'    => $user->full_name,
            'phone_number' => $user->phone_number,
            'created_at'   => $user->created_at,
            'user_games'   => []
        ] : null;
    }

    /**
     * Post point
     * @param $id
     * @param UserPointRequest $request
     * @return string[]
     */
    public function postPoint($id, UserPointRequest $request)
    {
        $gameId = $request->get('game_id', 0);
        $point  = $request->get('point', 0);
        $point  = max($point, 0);

        try {
            switch (true) {
                case !$this->userRepository->find($id):
                    $response = [
                        'message' => "User [$id] not found."
                    ];
                    break;
                case !$this->gameRepository->find($gameId):
                    $response = [
                        'message' => "Game [$gameId] not found."
                    ];
                    break;
                default:
                    $this->userGameRepository->updateOrCreate(['user_id', 'game_id'], ['point'], [
                        'user_id' => $id,
                        'game_id' => $gameId,
                        'point'   => $point,
                    ]);

                    $response = ['message' => 'Success'];
                    break;
            }
        } catch (Throwable $throwable) {
            Log::error($throwable->getMessage());
            $response = ['message' => 'Failed'];
        }

        return $response;
    }

    /**
     * Parse data user game
     * @param $userGames
     * @return array
     */
    private function parseUserGame($userGames)
    {
        $data = [];
        if ($userGames->count() > 0)
            foreach ($userGames as $userGame) {
                $data[] = [
                    'game_id'    => $userGame->id,
                    'game_name'  => $userGame->gameName,
                    'point'      => $userGame->point,
                    'created_at' => $userGame->created_at,
                ];
            }
        return $data;
    }
}
