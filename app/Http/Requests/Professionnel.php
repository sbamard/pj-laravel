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
        return true;
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
            'email' => ['required', 'string', 'max:255'],
            'formation' => ['required'],
            'domaine' => ['required'],
            'metier_id' => ['required'],
            'comp' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'metier_id.required' => 'Vous devez selectionner le métier principal du professionnel',
            'comp.required' => 'Vous devez selectionner au moins une compétence',
        ];
    }
}
