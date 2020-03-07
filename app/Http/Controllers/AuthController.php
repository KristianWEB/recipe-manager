<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use JWTAuth;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function login()
    {
        $credentials = request(['email', 'password']);
        if (!$token = auth('api')->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }
        return $this->respondWithToken($token);
    }


    public function register(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'username' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        if ($validator->fails()) {
            return response()->json($validator->errors()->toJson(), 400);
        }

        $user = User::create([
            'username' => $request->get('username'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
        ]);

        $credentials = request(['email', 'password']);

        $token = auth('api')->attempt($credentials);

        return $this->respondWithToken($token);
    }

    protected function respondWithToken($token)
    {
        return response()->json([
            'access_token' => $token,
            'user' => $this->guard()->user(),
            'token_type' => 'bearer',
        ]);
    }
    public function guard()
    {
        return Auth::guard('api');
    }

    // public function getAuthenticatedUser()
    // {
    //     try {

    //         if (!$user = JWTAuth::parseToken()->authenticate()) {
    //             return response()->json(['user_not_found'], 404);
    //         }
    //     } catch (Tymon\JWTAuth\Exceptions\TokenExpiredException $e) {

    //         return response()->json(['token_expired'], $e->getStatusCode());
    //     } catch (Tymon\JWTAuth\Exceptions\TokenInvalidException $e) {

    //         return response()->json(['token_invalid'], $e->getStatusCode());
    //     } catch (Tymon\JWTAuth\Exceptions\JWTException $e) {

    //         return response()->json(['token_absent'], $e->getStatusCode());
    //     }

    //     return response()->json(compact('user'));
    // }
}
