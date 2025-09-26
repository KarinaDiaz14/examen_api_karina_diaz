<?php

namespace App\Rules;

use App\Models\Task;
use Closure;
use Illuminate\Contracts\Validation\ValidationRule;
use Illuminate\Support\Facades\DB;

class CustomRuleTask implements ValidationRule
{
    private int $user_id;

    public function __construct(int $user_id)
    {

        $this->user_id = $user_id;
    }
    /**
     * Run the validation rule.
     *
     * @param  \Closure(string): \Illuminate\Translation\PotentiallyTranslatedString  $fail
     */
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        //    $sql = 'SELECT COUNT(is_completed)
        //     FROM tasks WHERE is_completed = 0 AND user_id = $user_id';
        // $isMaxCompleted = DB::select($sql);

        $isMaxCompleted = Task::where('is_completed', 0)->where('user_id', $this->user_id)->count();
        if ($isMaxCompleted < 6) {
            $fail('El usuario tiene más de 5 tareas pendientes');
        }
    }
}
