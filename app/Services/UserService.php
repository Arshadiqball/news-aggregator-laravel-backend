<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function updatePreferences(User $user, array $preferences)
    {
        $user->preferences()->updateOrCreate([], $preferences);
    }

    public function getPreferences(User $user)
    {
        return $user->preferences;
    }
}