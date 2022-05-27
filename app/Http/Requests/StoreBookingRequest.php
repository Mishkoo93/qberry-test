<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreBookingRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'freeze_camera_id' => 'integer',
            'temperature'      => 'integer|min:-30|max:0',
            'blocks'           => 'integer',
            'days'             => 'integer|min:1|max:24'
        ];
    }
}
