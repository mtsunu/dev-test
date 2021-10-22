<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    /**
     * Create a new AuthController instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth:api', ['except' => ['login']]);
    }

    /**
     * @OA\POST(
     *      path="/auth/login",
     *      tags={"No. 1"},
     *      summary="Auth login",
     *      description="Get a JWT via given credentials.",

     *     @OA\Response(
     *          response=200,
     *          description="Login sukses",
     *       ),
     *     )
     *
     * Get a JWT via given credentials.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function login(): JsonResponse
    {
        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized'], 401);
        }

        return $this->respondWithToken($token);
    }

    /**
     * @OA\POST(
     *      path="/auth/me",
     *      tags={"No. 1"},
     *      summary="Cek login",
     *      description="Get the authenticated User.",

     *     @OA\Response(
     *          response=200,
     *          description="User object",
     *       ),
     *     )
     *
     * Get the authenticated User.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function me(): JsonResponse
    {
        return response()->json(auth()->user());
    }

    /**
     * @OA\POST(
     *      path="/auth/logout",
     *      tags={"No. 1"},
     *      summary="logout",
     *      description="Log the user out (Invalidate the token).",

     *     @OA\Response(
     *          response=200,
     *          description="Logout berhasil",
     *       ),
     *     )
     *
     * Log the user out (Invalidate the token).
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function logout(): JsonResponse
    {
        auth()->logout();

        return response()->json(['message' => 'Successfully logged out']);
    }

    /**
     * Get the token array structure.
     *
     * @param string $token
     *
     * @return \Illuminate\Http\JsonResponse
     */
    protected function respondWithToken(string $token): JsonResponse
    {
        return response()->json([
            'access_token' => $token,
            'token_type' => 'bearer',
            'expires_in' => auth()->factory()->getTTL() * 60
        ]);
    }
}
