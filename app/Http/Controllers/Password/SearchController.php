<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Models\Password;
use App\Http\Requests\Password\SearchRequest;

class SearchController extends Controller
{
    //
    public function show (SearchRequest $request)
    {        
        $website = $request->get_site();
        $password = Password::where('site', 'like', "%$website%")->orderby('site')->get();
        $newId = Password::max('id') + 1;
        return view('password.index', ['name' => 'Laravel' ])
            ->with('passwords', $password)
            ->with('newId', $newId);        ;          
    }
}
