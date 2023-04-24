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
    /*
    public function show(Request $request)
    {
        //
        return view('password.register', ['name' => 'Laravel' ]);
    }
    */
    public function show(Request $request)
    {
        // GET ID
        $id = $request->route('id');              
        // GET INFO
        $values = Password::where('id', '=', $id)->first();        
        
        return view('password.register', [
            'name' => 'Laravel',
            'id' => $id,
            'values' => $values,                
            ]
        );        
    }

    public function create(CreateRequest $request)
    {        
        $values = $request->get_values();
       
        Password::create($values);
        return redirect()->route('password.index');        
        
    }

    public function update(CreateRequest $request)
    {

    }
}
