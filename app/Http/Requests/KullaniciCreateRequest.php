<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class KullaniciCreateRequest extends FormRequest
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
            'role' => 'required',
            'password' => 'required|Min:8',
            'email' => 'required|email',
            'profile_photo_path'=>'image|nullable|max:1024|mimes:jpg,jpeg,png',
        ];
    }

    public function attributes()
    {
        return [
            'name' => 'Kullanıcının adı',
            'role' => 'Kullanıcı rolü',
            'password' => 'Parola',
            'email' => 'e-Posta',
            'profile_photo_path'=>'Fotoğraf',
        ];
    }
}
