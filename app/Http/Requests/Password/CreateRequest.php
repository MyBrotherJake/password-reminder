<?php

namespace App\Http\Requests\Password;

use Illuminate\Foundation\Http\FormRequest;

class CreateRequest extends FormRequest
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
            'site' => 'required|max:30',
            'mail' => 'required',
            'password' => 'required',
        ];
    }

    public function get_values() : array
    {
        $site = $this->input('site');
        $mail = $this->input('mail');
        $account = $this->input('account');
        $pass = $this->input('password');
        $other = $this->input('other');

        if (!$account) $account = '';
        if (!$other) $other = '';

        $values = [
            'site' => $site,
            'maddr' => $mail,
            'account' => $account,
            'pass' => $pass,
            'bikou' => $other,
        ];       

        return $values;
    }
}
