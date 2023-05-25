<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Password\ImportRequest;
use App\Models\Password;


class ImportController extends Controller
{
    //
    public function import (ImportRequest $request)
    {
        if ($request->hasFile('file'))
        {
            $data = $request->file('file');
            $result = $request->csv_import($data);
            
            $this->update($result);
        }        
    }

    public function update ($result)
    {
        $password = new Password;
        dd($result[0][0]);
        //Password::upsert($result, ['id']);
        return redirect()->route('password.index')->with('feedback.success', "Successed Import!!");
    }
    
}
