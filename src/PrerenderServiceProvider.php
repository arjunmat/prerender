<?php

namespace ArjunMat\Prerender;

use Illuminate\Support\ServiceProvider;

class PrerenderServiceProvider extends ServiceProvider {

  /**
   * Bootstrap the application events.
   *
   * @return void
   */
  public function boot()
  {
    
    // Publish the configuration file
    $this->publishes(array(
        __DIR__ . '/config.php' => config_path('prerender.php'),
    ), 'config');

  }

  /**
   * Register the service provider.
   *
   * @return void
   */
  public function register()
  {
    
  }

}