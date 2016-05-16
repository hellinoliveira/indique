<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
//        if (!Auth::guest()) {
//            view()->composer('partials.nav', function ($view) {
//
//                $count = 0;
//                $indicacoes = Auth::user()->indicacoes()->get();
//
//                foreach ($indicacoes as $indicacao) {
//                    $movimentacoes = $indicacao->movimentacoes()->where('lido', 0)->get();
//                    $count += $movimentacoes->count();
//                }
//
//                $view->with('notificacoes', $count);
//            });
//
//            view()->composer('partials.nav', function ($view) {
//
//                $total = 0;
//                $indicacoes = Auth::user()->indicacoes()->where('situacao', 'DEPOSITADO')->get();
//
//                foreach ($indicacoes as $indicacao) {
////                dd($indicacao);
//                    $total += $indicacao->valor_indicacao;
//                }
//
//                $view->with('total', $total);
//            });
//        }
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
