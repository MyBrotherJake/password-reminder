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
            // Update
            $password = Password::where('id', '=', $value['id'])->first();
            if ($password) {
                $password->site = $value['site'];
                $password->account = $value['account'];
                $password->maddr = $value['maddr'];
                $password->pass = $value['pass'];
                $password->bikou = $value['bikou'];        

                $password->save();                       
            } else {                
                // Create
                $password = new Password;  
                $password->id = $value['id'];          
                $password->site = $value['site'];
                $password->account = $value['account'];
                $password->maddr = $value['maddr'];
                $password->pass = $value['pass'];
                $password->bikou = $value['bikou'];        
                $password->save();
                // GETTA NEW ID
                $newID = $password->id;
            }   
        }        
    }    
}
