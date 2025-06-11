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
            'IDKategoriInformasi' => 'required',
            'TanggalMulai' => 'required',
            'TanggalSelesai' => 'required',
            'Thumbnail' => 'nullable|image|file|mimes:png,jpg,webp|max:2024',
            'Judul' => 'required',
            'Deskripsi' => 'required',
            'target_type' => 'required|in:semua,satu,beberapa',
            'target_departemen_id' => 'required_if:target_type,satu',
            'target_departemen_ids' => 'required_if:target_type,beberapa|array|min:1',
            
        ];
    }
}
