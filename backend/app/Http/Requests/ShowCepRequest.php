<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ShowCepRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'cep' => ['required', 'string', 'regex:/^[0-9]{8}$/']
        ];
    }

    protected function prepareForValidation(): void
    {
        $this->merge([
            'cep' => $this->route('cep')
        ]);
    }

    public function wantsJson(): bool
    {
        return true;
    }
}
