<?php

namespace App\Http\Requests;
use Illuminate\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class StoreAlatRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    
    public function rules(): array
    {
        $id = $this->route('alat')?->id;

        return [
            'kode' => [
                'required',
                'string',
                'max:20',
                Rule::unique('alats', 'kode')->ignore($id),
            ],

            'nama' => ['required', 'string', 'min:3', 'max:100'],
            'stok' => ['required', 'integer', 'min:0'],
            'kondisi' => ['required', 'in:baik,rusak ringan,rusak berat'],
            'lokasi' => ['nullable', 'string', 'max:100'],
        ];
    }

    public function messages(): array
    {
        return [
            'kode.required' => 'Kode alat wajib diisi.',
            'kode.unique'   => 'Kode alat sudah dipakai.',
            'stok.min'      => 'Stok tidak boleh negatif.',
        ];
    }
}