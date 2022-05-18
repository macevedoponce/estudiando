<?php

namespace App\Rules;

use App\Lesson;
use Illuminate\Contracts\Validation\Rule;

class LessonTimeAvailabilityRule implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct($lesson = null)
    {
        $this->lesson = $lesson;
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
       return Dethorario::isTimeAvailable(request()->input('dia'), $value, request()->input('hora_fin'), request()->input('curId'), $this->lesson);
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'El horario no esta disponible';
    }
}
