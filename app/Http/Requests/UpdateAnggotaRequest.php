<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateAnggotaRequest extends FormRequest
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
            'nama' => [
                'required',
                'string',
                'max:255',
            ],
            'nis_nip' => [
                'required',
                'string',
                'unique:anggota,nis_nip,'.$this->anggota->id,
            ],
            'alamat' => [
                'nullable',
                'string',
            ],
            'no_hp' => [
                'nullable',
                'string',
                'max:20',
            ],
        ];
    }
}
