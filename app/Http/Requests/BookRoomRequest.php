<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BookRoomRequest extends FormRequest
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
            'room_id' => ['required', 'numeric'],
            'from' => ['required', 'date_format:Y-m-d', 'after:yesterday'],
            'to' => ['required', 'date_format:Y-m-d', 'after:from']
        ];
    }
}
