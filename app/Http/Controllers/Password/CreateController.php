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
        return view('password.register', ['name' => 'Laravel' ]);
    }
    public function create(CreateRequest $request)
    {        
        $values = $request->get_values();
       
        Password::create($values);
        return redirect()->route('password.index');
        
        
    }
}
