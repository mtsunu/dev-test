<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Exception;
use Illuminate\Http\Request;

class DebugSentryController extends Controller
{
    /**
     * @OA\Get(
     *      path="/debug-sentry",
     *      tags={"No. 4"},
     *      summary="Untuk mencoba integrasi sentry sesuai dengan soal nomor 4",
     *      description="Expected result adalah exception",
     *      @OA\Response(
     *          response=500,
     *          description="Successful operation",
     *       ),
     *     )
     *
     * @throws Exception
     */
    public function __invoke()
    {
        throw new Exception('My first Sentry error!');
    }
}
