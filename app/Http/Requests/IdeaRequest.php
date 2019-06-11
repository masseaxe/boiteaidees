<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class IdeaRequest extends Request
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
            'title' => 'required|min:5|max:60|string',
            'description' => 'required|min:5',
            'result' => 'required|min:5',
            'prenom' => 'required|min:4|alpha',
            'nom' => 'required|min:4|alpha',
            'email' => 'regex:^[a-z0-9](\.?[a-z0-9]){3,}@ca-normandie-seine\.fr$^',
            'theme_id' => 'exists:themes,id'

        ];
    }
}
