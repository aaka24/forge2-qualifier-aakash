<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index()
    {
        return Card::with(['list', 'member', 'tags'])->get();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'board_list_id' => 'required|exists:board_lists,id',
            'title' => 'required|string',
            'description' => 'nullable|string',
            'due_date' => 'nullable|date',
            'position' => 'nullable|integer',
        ]);

        return Card::create($data);
    }

    public function show(Card $card)
    {
        return $card->load(['list','member','tags']);
    }

    public function update(Request $request, Card $card)
{
    $data = $request->validate([
        'board_list_id' => 'nullable|exists:board_lists,id',
        'member_id' => 'nullable|exists:members,id',
        'title' => 'nullable|string',
        'description' => 'nullable|string',
        'due_date' => 'nullable|date',
        'position' => 'nullable|integer',
    ]);

    $card->update($data);

    return $card->load(['list','member','tags']);
}

    public function destroy(Card $card)
    {
        $card->delete();

        return response()->noContent();
    }
}