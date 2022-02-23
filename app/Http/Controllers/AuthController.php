<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    /**
     * @OA\Post(
     *      path="/admin/login",
     *      operationId="authenticate",
     *      tags={"Admin"},
     *      summary="",
     *      description="Login an Admin account",
     *      @OA\Parameter(
     *         name="email",
     *         in="query",
     *         description="Admin user emailId",
     *         required=true,
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Parameter(
     *         name="password",
     *         in="query",
     *         description="Admin user Password",
     *         required=true,
     *         @OA\Schema(type="string")
     *      ),
     *      @OA\Response(
     *          response=200,
     *          description="Ok",
     *       ),
     *      @OA\Response(
     *          response=401,
     *          description="Unauthenticated",
     *      ),
     *      @OA\Response(
     *          response=403,
     *          description="Forbidden"
     *      )
     *     )
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email'    => 'required|string',
            'password' => 'required|string'
        ]);

        if (!Auth::attempt(['email' => $request->input('email'), 'password' => $request->input('password'), 'is_admin' => 1])) {
            return response([
                'success' => false,
                'data'    => [],
                'error'   => 'The provided credentials are incorrect'
            ], Response::HTTP_UNAUTHORIZED);
        }

        $token = Auth::user()->createToken('token')->plainTextToken;
        return response([
            'success' => true,
            'data'    => [
                'token' => $token,
                'name'  => Auth::user()->full_name
            ],
            'error'   => null
        ], Response::HTTP_OK);
    }

}
