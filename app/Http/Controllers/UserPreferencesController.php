<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\Request;

class UserController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $this->userService->updatePreferences($user, $request->only(['category', 'source']));
        return response()->json(['message' => 'User preferences updated successfully']);
    }
}
