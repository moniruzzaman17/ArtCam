<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\View;
use App\CoreConfigData;
use App\Category;
use App\MediaGallery;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
      Schema::defaultStringLength(191);


      view()->composer('*', function ($view) 
      {
          $logo = MediaGallery::where('name','logo')->first()->value;
          $app_name = CoreConfigData::where('name','app_name')->first()->value;
          $about = CoreConfigData::where('name','about')->first()->value;

          $config=array(
                'logo' => $logo,
                'appName' => $app_name,
                'about' => $about
           );
        $view->with('config', $config); 
        $view->with('categories', Category::with('subCategories')->where('visibility',1)->orderBy('position','asc')->get()); 
      });
    }
}
