<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoomRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'kode' => ['required', 'unique:rooms,kode'],
            'nama_ruangan' => ['required'],
            'jenis' => ['required'],
            'daya_tampung' => ['required', 'min:1'],
            'fasilitas' => ['required'],
            'gambar' => ['required','image','mimes:png,jpg,jpeg,gif','max:5096'],
            'keterangan' => ['required'],
        ];
    }
}
