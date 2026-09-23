<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBukuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'judul' => [
                'required',
                'string',
                'max:255',
            ],
            'penulis' => [
                'required',
                'string',
                'max:255',
            ],
            'penerbit' => [
                'nullable',
                'string',
                'max:255',
            ],
            'tahun_terbit' => [
                'nullable',
                'integer',
                'digits:4',
            ],
            'isbn' => [
                'required',
                'string',
                'unique:buku,isbn,'.$this->buku->id,
            ],
            'stok' => [
                'required',
                'integer',
                'min:0',
            ],
        ];
    }
}
