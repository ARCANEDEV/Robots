<?php namespace Arcanedev\Robots;

use Arcanedev\Support\PackageServiceProvider as ServiceProvider;

/**
 * Class     RobotsServiceProvider
 *
 * @package  Arcanedev\Robots\Laravel
 * @author   ARCANEDEV <arcanedev.maroc@gmail.com>
 */
class RobotsServiceProvider extends ServiceProvider
{
    /* ------------------------------------------------------------------------------------------------
     |  Properties
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Vendor name.
     *
     * @var string
     */
    protected $vendor       = 'arcanedev';

    /**
     * Package name.
     *
     * @var string
     */
    protected $package      = 'robots';

    /**
     * Indicates if loading of the provider is deferred.
     *
     * @var bool
     */
    protected $defer = false;

    /* ------------------------------------------------------------------------------------------------
     |  Getters & Setters
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Get the base path of the package.
     *
     * @return string
     */
    public function getBasePath()
    {
        return dirname(__DIR__);
    }

    /* ------------------------------------------------------------------------------------------------
     |  Main Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Bootstrap the application events.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();
    }

    /**
     * Register the service provider.
     *
     * @return void
     */
    public function register()
    {
        $this->registerConfig();

        $this->registerRobotsService();
    }

    /**
     * Get the services provided by the provider.
     *
     * @return array
     */
    public function provides()
    {
        return [
            'arcanedev.robots',
            \Arcanedev\Robots\Contracts\Robots::class
        ];
    }

    /* ------------------------------------------------------------------------------------------------
     |  Other Functions
     | ------------------------------------------------------------------------------------------------
     */
    /**
     * Register Robots service.
     */
    private function registerRobotsService()
    {
        $this->app->singleton('arcanedev.robots', Robots::class);

        $this->app->bind(
            \Arcanedev\Robots\Contracts\Robots::class,
            'arcanedev.robots'
        );
    }
}
