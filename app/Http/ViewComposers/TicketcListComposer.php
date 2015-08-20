<?php namespace TeachMe\Http\ViewComposers;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Route;

/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 19/08/2015
 * Time: 20:57
 */
class TicketcListComposer
{

    public function compose($view)
    {
        $view->title = trans(Route::currentRouteName() . '_title');
        $view->text_total = Lang::choice(
            'tickets.total',
            $view->tickets->total(),
            ['title' => strtolower($view->title)]
        );
    }

}