<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TodoRequest extends FormRequest
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
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        switch ($this->method()) {
            case 'GET':
                return [
                    'id' => 'required|exists:todos,id',
                ];

            case 'POST':
                return [
                    'task' => 'required|string|max:255',
                    'status' => 'integer|in:0,1', // Assuming 'status' is an integer with values 0 or 1
                ];

            case 'PUT':
            case 'PATCH':
                return [
                    'task' => 'required|string|max:255',
                    'status' => 'integer|in:0,1', // Assuming 'status' is an integer with values 0 or 1
                ];

            case 'DELETE':
                return [
                    'id' => 'required|exists:todos,id',
                ];

            default:
                return [];
        }

    }
}
