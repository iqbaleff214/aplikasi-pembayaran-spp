<?php

namespace App\Http\Requests;

use App\Enums\Role;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Foundation\Http\FormRequest;

class UpdateGradeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return auth()->user()->role == Role::ADMIN->value;
    }

    public function attributes(): array
    {
        return [
            'grade_name' => 'Nama Kelas',
            'skill_competency' => 'Kompetensi Keahlian',
        ];
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'grade_name' => ['required'],
            'skill_competency' => ['required'],
        ];
    }
}
