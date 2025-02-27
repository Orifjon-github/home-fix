<?php

namespace App\Http\Controllers;

use App\Helpers\Response;
use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    use Response;
    public function register(RegisterRequest $request): JsonResponse
    {
        $user = User::create($request->all());
        if (!$user) return $this->error('Create User Error. Try Again');

        $user->token = $user->createToken('auth_token')->plainTextToken;

        return $this->success($user);
    }

    public function login(LoginRequest $request): JsonResponse
    {
        $username = $request->username;
        $password = $request->password;

        $type = is_numeric($username) ? 'phone' : 'email';
        $user = User::where($type, $username)->first();

        if (!$user) return $this->error('User Not Found', 404);

        if(!Hash::check($password, $user->password) ){
            return $this->error('Invalid Password', 403);
        }

        $token = $user->createToken('auth_token')->plainTextToken;

        return $this->success(['token' => $token]);
    }

    public function logout(Request $request): JsonResponse
    {
        $request->user()->tokens()->delete();

        return $this->success(['message' => 'Logged out successfully']);
    }

    public function delete(Request $request): JsonResponse
    {
        $request->user()->delete();

        return $this->success(['message' => 'Account deleted successfully']);
    }
}

