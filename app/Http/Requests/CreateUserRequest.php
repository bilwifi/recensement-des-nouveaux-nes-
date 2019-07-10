<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateUserRequest extends FormRequest
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
            'user_pseudo' => 'required|unique:agents_communes,pseudo',
            'user_profil.required' => 'le profil de l\'utilisateur est requis',
            'user_id.required' => 'le numéron d\'identfication est requis',
            'user_nom.required' => 'le nom de l\'utilisateur est requis',
        ];
    }
}
