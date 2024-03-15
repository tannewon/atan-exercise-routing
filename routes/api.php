<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/', function () {
    global $users;
    return $users;
});

Route::get('/{userid}', function (int $userid = 0) {
    global $users;

    if ($userid >= 0 && $userid < count($users)) {
        $user = $users[$userid];
        return $user;
    } else {

        return 'If cannot find the user with index: ' . $userid;
    }
})->where('userid', '[0-9]+');;

Route::get('/{userIndex}', function (string $username) {
    global $users;
    // echo count($users);
    for ($i = 0; $i < count($users); $i++) {
        if ($users[$i]['name'] == $username) {
            return $users[$i];
        }
    }
    return redirect(route('anyR', $username));
    // return 'If cannot find the user with name: ' . $username;
});
