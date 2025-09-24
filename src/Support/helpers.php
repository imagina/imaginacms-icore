<?php

use Nwidart\Modules\Facades\Module;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Http;

if (!function_exists('snakeToCamel')) {
  function snakeToCamel(string $input): string
  {
    return lcfirst(str_replace(' ', '', ucwords(str_replace('_', ' ', $input))));
  }
}

if (!function_exists('camelToSnake')) {
  function camelToSnake(string $input): string
  {
    $pattern = '!([A-Z][A-Z0-9]*(?=$|[A-Z][a-z0-9])|[A-Za-z][a-z0-9]+)!';
    preg_match_all($pattern, $input, $matches);
    $ret = $matches[0];
    foreach ($ret as &$match) {
      $match = $match == strtoupper($match)
        ? strtolower($match)
        : lcfirst($match);
    }
    return implode('_', $ret);
  }
}

if (!function_exists('isModuleEnabled')) {

  function isModuleEnabled(string $moduleName): bool
  {
    return Module::find($moduleName) && Module::isEnabled($moduleName);
  }
}

if (!function_exists('iconfig')) {
  function iconfig($configName = null, $byModule = false, $onlyEnableModules = true)
  {
    $response = config();

    if ($configName && strlen($configName)) {
      $modules = app('modules'); // Init modules
      $enabledModules = $onlyEnableModules ? $modules->allEnabled() : $modules->all();

      // Obtener paquetes cacheados
      $packages = getImaginaPackages();

      // Merge módulos + paquetes
      $allModules = array_merge(array_keys($enabledModules), $packages);

      if ($byModule) {
        $response = [];
        foreach ($allModules as $moduleName) {
          $response[$moduleName] = config(strtolower($moduleName) . "." . $configName, []);
        }
      } else {
        $configNameExplode = explode('.', $configName);
        $response = config(strtolower(array_shift($configNameExplode)) . "." . implode('.', $configNameExplode), []);
      }
    }

    return $response ?? [];
  }
}

if (!function_exists('getImaginaPackages')) {
  function getImaginaPackages(): array
  {
    return Cache::rememberForever('imagina_packages', function () {
      $packagesPath = base_path('vendor/imagina');
      $packages = [];

      if (is_dir($packagesPath)) {
        foreach (scandir($packagesPath) as $package) {
          if ($package === '.' || $package === '..') {
            continue;
          }
          $packages[$package] = $package;
        }
      }

      return $packages;
    });
  }
}

/**
 * Get Conversion Rates | With validation Cache
 */
if (!function_exists('getConversionRates')) {
  function getConversionRates()
  {

    $key = 'conversion_rates';
    $ttl = 86400; // 1 day

    if (config('app.cache')) {
      return Cache::remember($key, $ttl, function () {
        return fetchConversionRates();
      });
    }

    return fetchConversionRates();
  }
}

/**
 * Get Conversion Rates
 */
if (!function_exists('fetchConversionRates')) {
  function fetchConversionRates()
  {
    $response = Http::withHeaders(['app_token' => env('IMAGINA_RATES_TOKEN')])
      ->get(config('icore.urlConversionRate'));

    if ($response->successful()) {
      return $response->json();
    }

    \Log::error('ERROR| getConversionRates | Status: ' . $response->status());
    return [];
  }
}

if (!function_exists('urlFrontend')) {
  function urlFrontend($path = null)
  {
    $base = rtrim(env('FRONTEND_URL', ''), '/');
    if (!$base) return 'Frontend-URL not configured in .env';

    if (is_null($path) || empty($path))
      return $base;
    else
      return $base . '/' . ltrim($path, '/');
  }
}
