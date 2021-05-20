<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class OgrenciUpdateRequest extends FormRequest
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
            'name' => 'required|max:150',
            'parent_name' => 'required|max:150',
            'email' => 'required|max:150',
            'profile_photo_path'=>'image|nullable|max:1024|mimes:jpg,jpeg,png',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Öğrenci Adı',
            'parent_name' => 'Veli Adı',
            'email' => 'e-Posta',
            'profile_photo_path'=>'Fotoğraf',
        ];
    }
}
