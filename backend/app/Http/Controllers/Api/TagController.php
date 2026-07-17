<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Tag;
use Illuminate\Http\Request;

class TagController extends Controller
{
    public function index()
    {
        return Tag::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'color' => 'required|string',
        ]);

        return Tag::create($data);
    }

    public function show(Tag $tag)
    {
        return $tag->load('cards');
    }

    public function update(Request $request, Tag $tag)
    {
        $tag->update(
            $request->only(['name','color'])
        );

        return $tag;
    }

    public function destroy(Tag $tag)
    {
        $tag->delete();

        return response()->noContent();
    }
}