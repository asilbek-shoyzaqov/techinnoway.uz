<?php

namespace App\Providers;

use App\Models\Menu;
use App\Models\Submenu;
use App\Models\Word;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        View::composer ( '*', function ($view) {
            // Word va Menu ma'lumotlarini yuklash
            $topWord1 = Word::find ( 1 );
            $topWord2 = Word::find(2);
            $topWord3 = Word::find(3);
            $topWord4 = Word::find(4);
            $topWord5 = Word::find(5);
            $topWord6 = Word::find(6);
//            $topWord7 = Word::find(7);
//            $topWord8 = Word::find(8);
//            $topWord9 = Word::find(9);
//            $topWord10 = Word::find(10);
//            $topWord11 = Word::find(11);
//            $topWord12 = Word::find(12);
//            $topWord13 = Word::find(13);
//            $topWord14 = Word::find(14);
//            $topWord15 = Word::find(15);
//            $topWord16 = Word::find(16);
//            $topWord17 = Word::find(17);
//            $topWord18 = Word::find(18);
            $menus = Menu::with ( 'submenus' )->get ();
            $submenus = Submenu::with ( 'services' )->get ();


            // Ko'rinishga ma'lumotlarni o'tkazish
            $view->with ( [
                'topWord1' => $topWord1,
                'topWord2' => $topWord2,
                'topWord3' => $topWord3,
                'topWord4' => $topWord4,
                'topWord5' => $topWord5,
                'topWord6' => $topWord6,
//                'topWord7' => $topWord7,
//                'topWord8' => $topWord8,
//                'topWord9' => $topWord9,
//                'topWord10' => $topWord10,
//                'topWord11' => $topWord11,
//                'topWord12' => $topWord12,
//                'topWord13' => $topWord13,
//                'topWord14' => $topWord14,
//                'topWord15' => $topWord15,
//                'topWord16' => $topWord16,
//                'topWord17' => $topWord17,
//                'topWord18' => $topWord18,
                'menus' => $menus,
                'submenus' => $submenus,

            ] );
        } );
    }
}
