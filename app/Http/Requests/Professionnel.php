<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class Professionnel extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'prenom' => ['required', 'string', 'max:25'],
            'nom' => ['required', 'string', 'max:40'],
            'cp' => ['required', 'string', 'min:5', 'max:5'],
            'ville' => ['required', 'string', 'max:38'],
            'telephone' => ['required', 'string', 'max:14'],
            'mail' => ['required', 'string', 'max:255'],
            'formation' => ['required'],
            'domaine' => ['required'],
            'metier_id' => ['required'],
        ];
    }
}
