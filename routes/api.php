<?php

use Illuminate\Http\Request;
use App\Item;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/


Route::get('/items/{id}', function ($id) {
    $item = Item::find($id);
    return $item->toJson();
});
