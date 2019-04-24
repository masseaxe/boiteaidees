<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Input;

class RateRequest extends Request
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
     * exists:ideas,id :test si idea_id existe dans table idea colonne id
     *
     * @return array
     */
    public function rules()
    {

        return array(
            'email' => 'required|regex:^[a-z0-9](\.?[a-z0-9]){3,}@ca-normandie-seine\.fr$^',
            'uniqueId' => 'required|exists:ideas,uniqueId|voteunique:'.Input::get('email')
        );

        /*return [
            'score' => 'required|min:0|max:5|numeric',
            'email' => 'required|email',
            'idea_id' => "required|exists:ideas,id"
        ];*/
    }

    /*public function message()
    {
        return array(
            'uniqueId' => "Coucou Astrid"
        );
    }*/
}