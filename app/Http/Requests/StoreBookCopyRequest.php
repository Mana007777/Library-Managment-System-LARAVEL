<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookCopyRequest extends FormRequest
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
            'book_id' => ['required', 'exists:books,id'],
            'barcode' => ['required', 'string', 'unique:book_copies,barcode'],
            'shelf_location' => ['nullable', 'string'],
            'condition' => ['required', 'in:new,good,damaged'],
            'status' => ['required', 'in:available,borrowed,lost,maintenance'],
        ];
    }
}
