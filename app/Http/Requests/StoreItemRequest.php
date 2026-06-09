<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreItemRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Sanitasi input sebelum validasi.
     */
    protected function prepareForValidation()
    {
        $input = $this->all();

        array_walk($input, function (&$value) {
            if (is_string($value)) {
                $value = trim(strip_tags($value));
            }
        });

        $this->merge($input);
    }

    /**
     * Validation rules.
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:0',
            'price' => 'required|numeric|min:0',
            'category_id' => 'required|exists:categories,id',
        ];
    }

    /**
     * Custom validation messages.
     */
    public function messages(): array
    {
        return [
            'name.required' => 'Nama item wajib diisi.',
            'name.max' => 'Nama item maksimal 255 karakter.',

            'quantity.required' => 'Jumlah item wajib diisi.',
            'quantity.integer' => 'Jumlah item harus berupa angka.',
            'quantity.min' => 'Jumlah item tidak boleh kurang dari 0.',

            'price.required' => 'Harga wajib diisi.',
            'price.numeric' => 'Harga harus berupa angka.',
            'price.min' => 'Harga tidak boleh kurang dari 0.',

            'category_id.required' => 'Kategori wajib dipilih.',
            'category_id.exists' => 'Kategori tidak ditemukan.',
        ];
    }
}