<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});
// return view('welcome');
global $users;
$AllUsers = array();
for($i = 0; $i < count($users); $i++){
    $AllUsers[$i] = $users[$i]['name'];
}
return "the user are: " . implode(', ', $AllUsers);

