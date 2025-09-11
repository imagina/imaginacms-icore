<?php

namespace Imagina\Icore\Http\Controllers\Api;

use Illuminate\Http\Request;
use Imagina\Icore\Traits\Controller\CoreApiControllerHelpers;
use Illuminate\Http\JsonResponse;

class RatesApiController
{
  use CoreApiControllerHelpers;

  //Return fields
  public function index(Request $request): JsonResponse
  {

    try {

      //Get config
      $response = getConversionRates();

      //Response data
      $response = ['data' => $response];
    } catch (\Exception $e) {
      [$status, $response] = $this->getErrorResponse($e);
    }

    //Return response
    return response()->json($response, $status ?? 200);
  }
}
