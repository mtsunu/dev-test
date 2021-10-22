<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Arr;

class FilterObjectController extends Controller
{
    public function __invoke() : JsonResponse
    {
        $jsonString = file_get_contents(__DIR__ . '/filter-data.json');
        $json = json_decode($jsonString, true);

        $billDetails = collect(Arr::get($json, 'data.response.billdetails', []));

        $result = $billDetails
                    ->pluck('body')
                    ->map(function ($item) {
                        [, $value] = explode(':', $item[0]);
                        return trim($value);
                    })
                    ->filter(function ($value) {
                        return $value >= 100000;
                    })
                    ->values()
                    ->toArray();

        return response()->json($result, 200, [], JSON_FORCE_OBJECT);
    }
}
