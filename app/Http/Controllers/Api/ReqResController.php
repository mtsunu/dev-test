<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Client\Response;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Http;

class ReqResController extends Controller
{
    /**
     * @OA\POST(
     *      path="/reqres/login",
     *      tags={"All"},
     *      summary="Integrasi api dengan handle selain response success - login (nomor 2)",
     *      description="Returns json object. Error object original yang dikembalikan dari reqres.in ada di property original.",
     *      @OA\Response(
     *          response=500,
     *          description="Terjadi error dari reqres",
     *       ),
     *     @OA\Response(
     *          response=200,
     *          description="Tidak terjadi error dari reqres",
     *       ),
     *     )
     */
    public function login(): JsonResponse
    {
        $response = Http::post('https://reqres.in/api/login', [
            'email' => 'peter@klaven'
        ]);
        return $this->parseResponse($response);
    }

    /**
     * @OA\POST(
     *      path="/reqres/register",
     *      tags={"All"},
     *      summary="Integrasi api dengan handle selain response success - register (nomor 2)",
     *      description="Returns json object. Error object original yang dikembalikan dari reqres.in ada di property original.",
     *      @OA\Response(
     *          response=500,
     *          description="Terjadi error dari reqres",
     *       ),
     *     @OA\Response(
     *          response=200,
     *          description="Tidak terjadi error dari reqres",
     *       ),
     *     )
     */
    public function register(): JsonResponse
    {
        $response = Http::post('https://reqres.in/api/register', [
            'email' => 'eve.holt@reqres.in'
        ]);
        return $this->parseResponse($response);
    }

    /**
     * @param \Illuminate\Http\Client\Response $response
     * @return JsonResponse
     */
    public function parseResponse(Response $response): JsonResponse
    {
        $responseJson = $response->json();

        if (array_key_exists('error', $responseJson) && !empty($responseJson['error'])) { // bisa diganti dengan if( ! $response->successful())
            return response()->json([
                'status' => 'error',
                'message' => 'Reqres.in error',
                'original' => $responseJson
            ], 500);
        }

        return response()->json([
            'status' => 'ok'
        ]);
    }
}
