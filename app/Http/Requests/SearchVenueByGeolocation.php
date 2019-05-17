<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchVenueByGeolocation extends FormRequest
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
            'latitude'  => [
                'max:90',
                'min:-90',
                'numeric',
                'required',
            ],
            'longitude' => [
                'max:180',
                'min:-180',
                'numeric',
                'required',
            ],
            'distance'  => [
                'max:20000',
                'numeric',
                'required',
            ],
        ];
    }
}
