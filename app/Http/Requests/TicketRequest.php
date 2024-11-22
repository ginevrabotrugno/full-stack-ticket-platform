<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketRequest extends FormRequest
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
        return [
            'title' => 'required|string|max:255',
            'description' => 'required|string|min:10',
            'status' => 'required|integer|in:1,2,3',
            'operator' => 'required|exists:operators,id',
            'category' => 'required|exists:categories,id',
        ];
    }

    public function messages(): array
    {
        return [
            'title.required' => 'The title field is mandatory.',
            'title.string' => 'The title must be a valid string.',
            'title.max' => 'The title cannot exceed 255 characters.',

            'description.required' => 'The description field is mandatory.',
            'description.string' => 'The description must be a valid text.',
            'description.min' => 'The description must be at least 10 characters long.',

            'status.required' => 'The status field is mandatory.',
            'status.integer' => 'The status must be a valid choice.',
            'status.in' => 'The selected status is invalid.',

            'operator.required' => 'The operator field is mandatory.',
            'operator.exists' => 'The selected operator does not exist.',

            'category.required' => 'The category field is mandatory.',
            'category.exists' => 'The selected category does not exist.',
        ];
    }
}
