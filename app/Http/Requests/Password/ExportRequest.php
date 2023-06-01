<?php

namespace App\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Password;

class ExportRequest extends FormRequest
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

    public function get_allData()
    {
        $passwords = Password::all();
        return $passwords;
    }    
}
