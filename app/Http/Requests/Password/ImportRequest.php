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
        //$line = fgetcsv($fp);
        $data =[];
        $cnt = 0;
        while ($line = fgetcsv($fp))
        {
            if ($cnt > 0)
            {
                array_push($data, $line);
            }            
            $cnt++;
        }
        fclose($fp);
        return $data;
    }
}
