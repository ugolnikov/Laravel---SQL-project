<?php

namespace App\Rules;

use Illuminate\Contracts\Validation\Rule;
use App\Models\Student;

class UniqueStudent implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //  
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $surname = request()->input('surname');
        $first_name = request()->input('first_name');
        $patronymic = request()->input('patronymic');
        $birthdate = request()->input('birthdate');
        $class_id = request()->input('class_id');

        \Log::info('Validating unique student:', [
            'surname' => $surname,
            'first_name' => $first_name,
            'patronymic' => $patronymic,
            'birthdate' => $birthdate,
            'class_id' => $class_id,
        ]);

        return !Student::where('surname', $surname)
                    ->where('first_name', $first_name)
                    ->where('patronymic', $patronymic)
                    ->where('birthdate', $birthdate)
                    ->where('class_id', $class_id)
                    ->exists();
    }
    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Ученик с такими ФИО и датой рождения уже существует.';
    }
}
