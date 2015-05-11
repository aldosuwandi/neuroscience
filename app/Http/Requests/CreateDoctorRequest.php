<?php namespace App\Http\Requests;

use App\Http\Requests\Request;

class CreateDoctorRequest extends Request {

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
            'name' => 'required',
            'title' => 'required',
			'image' => 'required',
            'birthday' => 'required',
            'institution' => 'required',
            'address' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'education' => 'required',
            'experience' => 'required',
            'organization' => 'required',
            'training' => 'required',
            'publication' => 'required'
		];
	}

}
