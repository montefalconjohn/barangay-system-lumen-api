<?php

namespace App\Http\Requests;

use Anik\Form\FormRequest;
use Illuminate\Http\Request;

class EmploymentStatusRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    protected function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    protected function rules(): array
    {
        return Request::isMethod('post') ? $this->postValidation() : $this->patchValidation();
    }

       /**
     * Validation for post method request
     */
    private function postValidation(): array
    {
        return [
            'employment_status' => 'required|string|unique:employment_statuses'
        ];
    }

    /**
     * Validation for patch method request
     */
    private function patchValidation(): array
    {
        // the rule in email is to avoid the unique constraint error
        return [
            'employment_status' => 'string|unique:employment_statuses,employment_status,' . $this->id
        ];
    }
}
