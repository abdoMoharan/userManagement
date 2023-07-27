<?php

namespace App\Http\Requests;

use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UserRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return $this->isMethod('POST') ? [
            'name' => ['required', 'string'],
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'mobile' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'password' => ['required', 'string', 'min:8', 'max:250'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            // 'roles' => ['required', 'array'],
            'status' => ['nullable'],
            'type' => ['nullable'],
            'created_by' => ['nullable'],
            'updated_by' => ['nullable'],
        ] : [
            'name' => ['required', 'string'],
            'email' => 'required', 'email', Rule::unique('users', 'email')->ignore($this->get('id')),
            'mobile' => ['nullable', 'regex:/^([0-9\s\-\+\(\)]*)$/', 'min:10'],
            'password' => ['nullable', 'string', 'min:8', 'max:250'],
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif',
            // 'roles' => ['required', 'array'],
            'status' => ['nullable'],
            'type' => ['nullable'],

            'created_by' => ['nullable'],
            'updated_by' => ['nullable'],
        ];
    }

    public function getSanitized()
    {
        $data = $this->validated();

        if (request()->isMethod('PUT')) {
            $data['updated_by']  = @auth()->user()->id;
        } else {
            $data['created_by']  = @auth()->user()->id;
        }
        return $data;
    }
}