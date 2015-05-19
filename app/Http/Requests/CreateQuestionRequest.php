<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateQuestionRequest extends Request {

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
            'questioner' => 'required|min:3|max:100',
            'email' => 'required|email',
            'question_title' => 'required|min:5|max:100',
            'question_text' => 'required|min:5|max:2048',
            'g-recaptcha-response' => 'required|captcha',
        ];
    }

}
