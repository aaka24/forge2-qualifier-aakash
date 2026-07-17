<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\BoardController;
use App\Http\Controllers\Api\BoardListController;
use App\Http\Controllers\Api\CardController;
use App\Http\Controllers\Api\MemberController;
use App\Http\Controllers\Api\TagController;


Route::apiResource('boards', BoardController::class);

Route::apiResource('lists', BoardListController::class);

Route::apiResource('cards', CardController::class);

Route::apiResource('members', MemberController::class);

Route::apiResource('tags', TagController::class);