<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class CompanyFormRequest extends Request
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
            'name' => 'required',
            'phone' => 'required',
            'address' => 'required',
            'description' => 'required',
            'logo_url' => 'required|mimes:jpeg,png,gif',
            'admin_full_name' => 'required',
            'admin_email' => 'required|email',
            'marketing_document' => 'required|mimes:doc,docx,pdf'
        ];
    }
}
