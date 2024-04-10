<?php

namespace App\Services;

use App\Models\User;

class UserService
{
    public function updatePreferences(User $user, array $preferences)
    {
        $formattedPreferences = [];

        foreach ($preferences as $key => $value) {
            // Check if the value is not an empty array
            if (!empty($value)) {
                // Serialize the array to a string
                $serializedValue = json_encode($value);
                $formattedPreferences[$key] = $serializedValue;
            }
        }

        $user->preferences()->updateOrCreate([], $formattedPreferences);
    }


    public function getPreferences(User $user)
    {
        return $user->preferences;
    }
}