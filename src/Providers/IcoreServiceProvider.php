<?php

namespace Imagina\Icore\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Route;
use Imagina\Icore\Routes\RouterGenerator;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Imagina\Icore\Http\Middleware\VerifyRecaptchaV3;
use RecursiveIteratorIterator;
use RecursiveDirectoryIterator;

class IcoreServiceProvider extends ServiceProvider
{
  public function boot(): void
  {
    // Registrar macro apiCrud
    Route::macro('apiCrud', function ($params) {
      app(RouterGenerator::class)->apiCrud($params);
    });

    // Registrar middleware
    $router = $this->app['router'];
    $router->aliasMiddleware('recaptcha.v3', VerifyRecaptchaV3::class);

    // Registrar macros de Blueprint
    Blueprint::macro('auditStamps', function () {
      if (!Schema::hasColumn($this->getTable(), 'deleted_at')) {
        $this->timestamp('deleted_at', 0)->nullable();
      }
      if (!Schema::hasColumn($this->getTable(), 'created_by')) {
        $this->unsignedInteger('created_by')->nullable();
        $this->foreign('created_by')->references('id')->on(config('auth.table', 'iusers_user'))->onDelete('restrict');
      }
      if (!Schema::hasColumn($this->getTable(), 'updated_by')) {
        $this->unsignedInteger('updated_by')->nullable();
        $this->foreign('updated_by')->references('id')->on(config('auth.table', 'iusers_user'))->onDelete('restrict');
      }
      if (!Schema::hasColumn($this->getTable(), 'deleted_by')) {
        $this->unsignedInteger('deleted_by')->nullable();
        $this->foreign('deleted_by')->references('id')->on(config('auth.table', 'iusers_user'))->onDelete('restrict');
      }
    });

    $this->registerTranslations();
  }

  public function register(): void
  {
    $this->registerConfig();
  }

  /**
   * Registrar archivos de configuración del paquete.
   */
  protected function registerConfig(): void
  {
    $configPath = __DIR__ . '/../Config';

    if (is_dir($configPath)) {
      $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($configPath));

      foreach ($iterator as $file) {
        if ($file->isFile() && $file->getExtension() === 'php') {
          $config = str_replace($configPath . DIRECTORY_SEPARATOR, '', $file->getPathname());
          $configKey = str_replace([DIRECTORY_SEPARATOR, '.php'], ['.', ''], $config);

          $key = ($config === 'config.php') ? 'icore' : 'icore.' . $configKey;

          // Permitir publicación de config
          $this->publishes([
            $file->getPathname() => config_path("icore/{$config}"),
          ], 'icore-config');

          // Merge con la config de Laravel
          $this->mergeConfigFrom($file->getPathname(), $key);
        }
      }
    }
  }

  /**
   * Registrar traducciones del paquete.
   */
  protected function registerTranslations(): void
  {
    $langPath = resource_path('lang/vendor/icore');

    if (is_dir($langPath)) {
      $this->loadTranslationsFrom($langPath, 'icore');
    } else {
      $this->loadTranslationsFrom(__DIR__ . '/../Resources/lang', 'icore');
    }

    $this->publishes([
      __DIR__ . '/../Resources/lang' => resource_path('lang/vendor/icore'),
    ], 'icore-translations');
  }
}
