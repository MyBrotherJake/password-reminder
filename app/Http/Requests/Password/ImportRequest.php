<?php

namespace App\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;

class ImportRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            //
        ];
    }

    public function csv_import ($filePath)
    {
        // Open File
        $fp = fopen($filePath, 'r');        
        // データ格納用
        $data =[];
        // データカウント
        $cnt = 0;
        // 1行ずつ読み込む
        while ($line = fgetcsv($fp))
        {
            // Encoding
            mb_convert_variables('UTF-8', 'SJIS-win', $line);
            
            // ヘッダー行は無視
            if ($cnt > 0)            
            {                  
                $data[$cnt - 1] = [
                    'id' => $line[0],
                    'site' => $line[1],
                    'maddr' => $line[2],
                    'account' => $line[3],
                    'pass' => $line[4],
                    'bikou' => $line[5],
                ];                
            }            
            $cnt++;
        }
        // Close File
        fclose($fp);        
        // 配列を返す
        return $data;
    }
}
