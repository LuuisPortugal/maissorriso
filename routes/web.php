<?php

use App\MenuLayout;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

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

Auth::routes();
Route::redirect('/', '/login');

foreach (MenuLayout::all() as $oMenu)
    Route::match($oMenu->method, $oMenu->uri, $oMenu->action)
        ->name($oMenu->name);

View::composers(['App\Http\ViewComposers\MenuLayoutComposer' => 'layouts.app']);