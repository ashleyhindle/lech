<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DecodeRequest extends FormRequest
{
    /**
     * @return array<mixed>
     */
    public function rules(): array
    {
        return [
            'url' => ['required', 'url', 'string'],
        ];
    }
}
