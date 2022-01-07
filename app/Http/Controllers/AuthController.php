<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
class AuthController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:a', ['except' => ['login']]);
    }

    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('a')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }

    public function me()
    {
        return response()->json(auth('a')->user());
    }

    public function logout()
    {
        auth('a')->logout();
        return response()->json(['message' => 'Successfully logged out']);
    }

    public function refresh()
    {
        return $this->respondWithToken(auth('a')->refresh());
    }

    protected function respondWithToken($token)
    {
        return response()->json(['token' => $token, 'token_type' => 'bearer', 'expires_in' => auth('a')->factory()->getTTL() * 60]);
    }
}
