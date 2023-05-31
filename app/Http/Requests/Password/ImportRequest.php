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
        $fp = fopen($filePath, 'r');        
        $data =[];
        $cnt = 0;
        while ($line = fgetcsv($fp))
        {
            mb_convert_variables('UTF-8', 'SJIS-win', $line);

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
        fclose($fp);        

        return $data;
    }
}
