<?php

namespace App\Http\Controllers\Api;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Libraries\MineSweeper;

class GameController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Get a game board
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function get($difficult)
    {
        $board = new MineSweeper($difficult);
        $response = [];
        $response['success'] = true;
        $response['data'] = $board->getData();

        return response()->json($response);
    }
}
