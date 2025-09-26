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
        $pendingTasksCount = Task::where('user_id', $this->user_id)
            ->where('is_completed', 0)
            ->count();

        if ($pendingTasksCount >= 5) {
            $fail("El usuario ya tiene 5 tareas pendientes.");
        }
    }
}
