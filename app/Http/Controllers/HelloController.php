<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HelloController extends Controller
{
    public function hello(string $name, string $age)
    {
        return view('Hello.index', [
            'name' => $name,
            'age' => $age
        ]);
    }
}
