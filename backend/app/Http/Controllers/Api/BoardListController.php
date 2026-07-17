<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\BoardList;
use Illuminate\Http\Request;

class BoardListController extends Controller
{
    public function index()
    {
        return BoardList::with('cards')->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'board_id' => 'required|exists:boards,id',
            'name' => 'required|string',
            'position' => 'nullable|integer',
        ]);

        return BoardList::create($data);
    }

    public function show(BoardList $list)
    {
        return $list->load('cards');
    }

    public function update(Request $request, BoardList $list)
    {
        $list->update(
            $request->only([
                'name',
                'position'
            ])
        );

        return $list;
    }

    public function destroy(BoardList $list)
    {
        $list->delete();

        return response()->noContent();
    }
}