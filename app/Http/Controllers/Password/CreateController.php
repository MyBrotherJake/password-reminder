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
        // GET ID
        $id = $request->route('id');              
        // GET INFO
        $result = Password::where('id', '=', $id)->first();        
        //
        $values['id'] = $id; 
        $values['site'] = optional($result)->site;
        $values['account'] = optional($result)->account;
        $values['maddr'] = optional($result)->maddr;
        $values['pass'] = optional($result)->pass;
        $values['bikou'] = optional($result)->bikou;        

        return view('password.register', [
            'name' => 'Laravel',
            'message' => '',
            'id' => $id,
            'values' => $values,                
            ]
        );        
    }
        
    public function create(CreateRequest $request)
    {
        // GET ID
        $id = $request->id;           
        
        $password = Password::where('id', '=', $id)->first();
        // データがあればUpdate、なければInsert
        if ($password) {
            $values = $this->setValues($request, $password);                    
        } else {
            $password = new Password;            
            $values = $this->setValues($request, $password);                        
            // 新規ID を渡す
            $password->id = $id;
        }
        // 登録・更新処理
        $password->save();        

        return view('password.register', [
            'name' => 'Laravel',
            'message' => 'Registered',
            'id' => $id,
            'values' => $values,                
            ]
        );                    
    }


    private function setValues(CreateRequest $request, $password)
    {
        $values = $request->get_values();
        
        $password->site = $values['site'];
        $password->account = $values['account'];
        $password->maddr = $values['maddr'];
        $password->pass = $values['pass'];
        $password->bikou = $values['bikou'];                

        return $values;
    }
}
