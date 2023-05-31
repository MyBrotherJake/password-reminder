<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Password\ImportRequest;
use App\Models\Password;

use Illuminate\Database\QueryException;

class ImportController extends Controller
{
    //
    public function import (ImportRequest $request)
    {
        $message = 'No File';

        if ($request->hasFile('file'))
        {
            $file = $request->file('file');
            $data = $request->csv_import($file);
            
            try {
                $this->update($data);  
                $message = "Successed Import!!";          
            } catch (QueryException $e) {
                $message = "Couldn't Import: ". $e->getMessage();
            }            
        }   
        return redirect()->route('password.index')->with('feedback.success', $message);             
    }

    public function update ($data)
    {
        foreach($data as $key => $value)
        {                   
            $password = Password::updateOrCreate(
                ['id' => $value['id']],
                [
                    'site' => $value['site'],
                    'maddr' => $value['maddr'],
                    'account' => $value['account'],
                    'pass' => $value['pass'],
                    'bikou' => $value['bikou'],
                ]
            );                
        }        
    }    
}
