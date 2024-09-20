<?php
declare(strict_types=1);

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RoleRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'role' => ['required'],
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}
