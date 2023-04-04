<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use App\Http\Requests\Password\CreateRequest;
use Illuminate\Http\Request;

use App\Models\Password;


use Illuminate\Support\Facades\Log;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request)
    {
        //
        return view('password.create', ['name' => 'Laravel' ]);
    }
    public function create(CreateRequest $request)
    {
        $password = new Password;
        $values = $request->get_values();
        Log::debug($values);
        /*
        $password->site = array_get($values, 'site');
        $password->maddr = array_get($values, 'maddr');
        $password->account = array_get($values, 'account');
        $password->pass = array_get($values, 'pass');
        $password->bikou = array_get($values, 'bikou');
        */
        Password::create($values);
        return redirect()->route('password.index');
        
        
    }
}
