<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePostRequest extends FormRequest
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
        if ($this->is('kategori')) {
            return [
                'kodeKategori' => 'required',
                'namaKategori' => 'required',
            ];
        }
        if ($this->is('level')) {
            return [
                'kodeLevel' => 'required',
                'namaLevel' => 'required',
            ];
        }
        if ($this->is('user')) {
            return [
                'username' => 'required',
                'nama' => 'required',
                'password' => 'required',
                'levelId' => 'required',
            ];
        }
        return [];
    }
}
