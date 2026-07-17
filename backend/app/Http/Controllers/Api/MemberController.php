<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Member;
use Illuminate\Http\Request;

class MemberController extends Controller
{
    public function index()
    {
        return Member::all();
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'name' => 'required|string',
            'email' => 'nullable|email',
        ]);

        return Member::create($data);
    }

    public function show(Member $member)
    {
        return $member->load('cards');
    }

    public function update(Request $request, Member $member)
    {
        $member->update(
            $request->only(['name','email'])
        );

        return $member;
    }

    public function destroy(Member $member)
    {
        $member->delete();

        return response()->noContent();
    }
}