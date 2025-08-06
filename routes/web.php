<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\View;
// use App\Http\Controllers\IndexController; 
use App\Http\Controllers\HelloController;

// Route::get('/', [IndexController::class, 'home']); 

// Route::get('/',function(){
//     return 'Morning Guys';
// });

Route::get('hello/{name}/{age}',[HelloController::class,'hello']);