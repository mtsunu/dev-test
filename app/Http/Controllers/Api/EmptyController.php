<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class EmptyController extends Controller
{
    /**
     * @OA\Info(
     *      version="1.0.0",
     *      title="Meigire OpenApi Demo Documentation",
     *      description="Meigire demo backend test OpenApi description",
     *      @OA\Contact(
     *          email="meigire0583@gmail.com"
     *      ),
     *      @OA\License(
     *          name="Apache 2.0",
     *          url="http://www.apache.org/licenses/LICENSE-2.0.html"
     *      )
     * )
     *
     * @OA\Server(
     *      url=L5_SWAGGER_CONST_HOST,
     *      description="Meigire Demo API Server"
     * )

     *
     * @OA\Tag(
     *     name="All",
     *     description="Semua API endpoints yang ada"
     * )
     */
}
