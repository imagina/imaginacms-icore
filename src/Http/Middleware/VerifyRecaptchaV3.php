<?php

namespace Imagina\Icore\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class VerifyRecaptchaV3
{
  public function handle(Request $request, Closure $next, $action = 'default')
  {
    $token = $request->header('google-recaptcha-token');

    if (!$token) {
      return response()->json(['error' => 'Captcha token missing'], 422);
    }

    $response = Http::asForm()->post('https://www.google.com/recaptcha/api/siteverify', [
      'secret'   => env('RECAPTCHA_SECRET'),
      'response' => $token,
      'remoteip' => $request->ip(),
    ])->json();

    if (!($response['success'] ?? false) || ($response['score'] ?? 0) < (float) env('RECAPTCHA_MIN_SCORE', 0.5)) {
      return response()->json(['error' => 'Captcha validation failed'], 422);
    }

    return $next($request);
  }
}
