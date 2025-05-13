<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InformasiRequest extends FormRequest
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
            'IDOperator' => 'required',
            'IDKategoriInformasi' => 'required',
            'Judul' => 'required',
            'Deskripsi' => 'required',
            'Thumbnail' => 'nullable|image|file|mimes:png,jpg,webp|max:2024',
            'TargetDepartemen' => 'nullable',
            'Status' => 'nullable',
            
        ];
    }
}
