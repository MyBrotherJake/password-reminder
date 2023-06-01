<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Models\Password;
use Illuminate\Http\Request;


class IndexController extends Controller
{
    //
    public function show(Request $request) 
    {
        $passwords = Password::orderBy('site')->get();        
        return view('password.index', ['name' => 'Laravel' ])
            ->with('passwords', $passwords);        
    }
}
