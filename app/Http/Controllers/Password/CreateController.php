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
        $result = Password::where('id', '=', $id)->first();        
        // 
        $values['site'] = optional($result)->site;
        $values['account'] = optional($result)->account;
        $values['maddr'] = optional($result)->maddr;
        $values['pass'] = optional($result)->pass;
        $values['bikou'] = optional($result)->bikou;

        //dd($values['site']);

        return view('password.register', [
            'name' => 'Laravel',
            'id' => $id,
            'values' => $values,                
            ]
        );        
    }

    public function create(CreateRequest $request)
    {        
        $password = new Password;
        $values = $request->get_values();

        $password->site = $values['site'];
        $password->account = $values['account'];
        $password->maddr = $values['maddr'];
        $password->pass = $values['pass'];
        $password->bikou = $values['bikou'];

        $password->save();
        
        return redirect()->route('password.index');        
        
    }

    public function update(CreateRequest $request)
    {

    }
}
