<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Board;
use Illuminate\Http\Request;

class BoardController extends Controller
{
    public function index()
    {
        return Board::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
        ]);

        $board = Board::create([
            'name' => $request->name,
        ]);

        return response()->json($board, 201);
    }

    public function show(Board $board)
    {
        return $board->load('lists');
    }

    public function update(Request $request, Board $board)
    {
        $board->update($request->only('name'));

        return $board;
    }

    public function destroy(Board $board)
    {
        $board->delete();

        return response()->noContent();
    }
}