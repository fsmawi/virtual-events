<?php
namespace App\Providers;

use App\Company;
use App\Event;
use App\Stand;
use App\Visitor;
use App\Repositories\Companies\Eloquent as CompaniesEloquentRepository;
use App\Repositories\Events\Eloquent as EventsEloquentRepository;
use App\Repositories\Stands\Eloquent as StandsEloquentRepository;
use App\Repositories\Visitors\Eloquent as VisitorsEloquentRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected $repositories = array();

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->registerCompaniesRepository();
        $this->registerEventsRepository();
        $this->registerStandsRepository();
        $this->registerVisitorsRepository();
    }

    /**
     * Register the companies repository.
     */
    protected function registerCompaniesRepository()
    {
        $this->app->bind(
            '\App\Repositories\Companies\Contract',
            function () {
                return new CompaniesEloquentRepository(new Company());
            }
        );
    }

    /**
     * Register the events repository.
     */
    protected function registerEventsRepository()
    {
        $this->app->bind(
            '\App\Repositories\Events\Contract',
            function () {
                return new EventsEloquentRepository(new Event());
            }
        );
    }

    /**
     * Register the stands repository.
     */
    protected function registerStandsRepository()
    {
        $this->app->bind(
            '\App\Repositories\Stands\Contract',
            function () {
                return new StandsEloquentRepository(new Stand());
            }
        );
    }

    /**
     * Register the visitors repository.
     */
    protected function registerVisitorsRepository()
    {
        $this->app->bind(
            '\App\Repositories\Visitors\Contract',
            function () {
                return new VisitorsEloquentRepository(new Visitor());
            }
        );
    }
}