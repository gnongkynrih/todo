<?php
namespace App\Policies;

use App\Models\Task;
use App\Models\User;
use Illuminate\Auth\Access\HandlesAuthorization;

class TaskPolicy
{
    use HandlesAuthorization;

    public function viewAny(User $user)
    {
        if ($user->is_admin) {
            return true;
        }
        return Task::where('user_id', $user->id)->exists();
    }
}
