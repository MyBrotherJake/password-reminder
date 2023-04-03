<?php

namespace App\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;

class SearchRequest extends FormRequest
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
    /**
     * Get Website Name
     */
    public function get_site() : string
    {
        $siteName = $this->input('site');
        
        if ($siteName) 
        {
            return $siteName;    
        } else {
            return '';
        }        
    }
}
