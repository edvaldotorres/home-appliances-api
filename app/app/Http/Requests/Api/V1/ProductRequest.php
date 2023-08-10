<?php

namespace App\Http\Requests\Api\V1;

use Illuminate\Foundation\Http\FormRequest;

class ProductRequest extends FormRequest
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
        return [
            'mark_id' => 'required|integer|exists:marks,id',
            'name' => 'required|string|min:3|max:255',
            'description' => 'nullable|string|max:255',
            'tension' => 'required|numeric'
        ];
    }
}
