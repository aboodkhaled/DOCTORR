<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Route;

class RouteServiceProvider extends ServiceProvider
{
    /**
     * This namespace is applied to your controller routes.
     *
     * In addition, it is set as the URL generator's root namespace.
     *
     * @var string
     */
    protected $namespace = 'App\Http\Controllers';

    /**
     * The path to the "home" route for your application.
     *
     * @var string
     */
    public const HOME = '/';
    public const ADMIN = '/admin';
    public const DOCTORR = '/doctorr';
    public const VENLABE = '/venlabe';
    public const VENPHARMICE = '/venpharmice';
    public const HOSBITALL = '/hosbitall';
    public const FHOSBITALL = '/fhosbitall';
    public const CLINIC = '/clinic';
    public const H_DOCTOR = '/h_doctor';
    public const F_DOCTOR = '/f_doctor';
    public const VERIFIED = '/verify';

    /**
     * Define your route model bindings, pattern filters, etc.
     *
     * @return void
     */
    public function boot()
    {
        //

        parent::boot();
    }

    /**
     * Define the routes for the application.
     *
     * @return void
     */
    public function map()
    {
        $this->mapApiRoutes();

        $this->mapWebRoutes();

        $this->mapSiteRoutes();

        $this->mapAdminRoutes();

        $this->mapDoctorrRoutes();

        $this->mapVenlabeRoutes();
        
        $this->mapVenpharmiceRoutes();

        $this->mapHosbitallRoutes();
        $this->mapFHosbitallRoutes();

        $this->mapClinicRoutes();
        $this->mapH_doctorRoutes();
        $this->mapF_doctorRoutes();




        //
    }

    /**
     * Define the "web" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapWebRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/web.php'));
    }

      /**
     * Define the "admin" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapAdminRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('admin')
            ->group(base_path('routes/admin.php'));
    }

      /**
     * Define the "doctor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapDoctorrRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('doctor')
            ->group(base_path('routes/doctor.php'));
    }

      /**
     * Define the "venlabe" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapVenlabeRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('venlabe')
            ->group(base_path('routes/venlabe.php'));
    }

     /**
     * Define the "venpharmice" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapVenpharmiceRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('venpharmice')
            ->group(base_path('routes/venpharmice.php'));
    }

     /**
     * Define the "venpharmice" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapHosbitallRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('hosbitall')
            ->group(base_path('routes/hosbital.php'));
    }

      /**
     * Define the "venpharmice" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapFHosbitallRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('hosbitall')
            ->group(base_path('routes/fhosbital.php'));
    }

    /**
     * Define the "venpharmice" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapClinicRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('clinic')
            ->group(base_path('routes/clinic.php'));
    }

      /**
     * Define the "doctor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapH_doctorRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('doctor')
            ->group(base_path('routes/h_doctor.php'));
    }
      /**
     * Define the "doctor" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapF_doctorRoutes()
    {
        Route::middleware('web')
            ->namespace($this->namespace)
           // ->prefix('doctor')
            ->group(base_path('routes/f_doctor.php'));
    }



      /**
     * Define the "site" routes for the application.
     *
     * These routes all receive session state, CSRF protection, etc.
     *
     * @return void
     */
    protected function mapSiteRoutes()
    {
        Route::middleware('web')
             ->namespace($this->namespace)
             ->group(base_path('routes/site.php'));
    }

    /**
     * Define the "api" routes for the application.
     *
     * These routes are typically stateless.
     *
     * @return void
     */
    protected function mapApiRoutes()
    {
        Route::prefix('api')
             ->middleware('api')
             ->namespace($this->namespace)
             ->group(base_path('routes/api.php'));
    }
}
