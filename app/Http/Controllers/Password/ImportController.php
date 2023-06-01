<?php

namespace App\Http\Controllers\Password;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\Password\ImportRequest;
use App\Models\Password;

use Illuminate\Database\QueryException;

class ImportController extends Controller
{
    // CSV Import
    public function import (ImportRequest $request)
    {
        $message = 'No File';
        // ファイルがあれば
        if ($request->hasFile('file'))
        {
            // Get File
            $file = $request->file('file');
            // CSVから配列に変換
            $data = $request->csv_import($file);
            
            try {                
                // Upsert処理
                $this->update($data);  
                $message = "Successed Import!!";          
            } catch (QueryException $e) {
                $message = "Couldn't Import: ". $e->getMessage();
            }            
        }   
        // 一覧へリダイレクト
        return redirect()->route('password.index')->with('feedback.success', $message);             
    }
    // DataBase への upsert 処理
    public function update ($data)
    {
        // 1行ずつ
        foreach($data as $key => $value)
        {               
            Password::updateOrCreate(
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
