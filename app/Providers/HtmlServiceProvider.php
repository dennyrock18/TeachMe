<?php

namespace TeachMe\Providers;
/**
 * Created by PhpStorm.
 * User: Denny
 * Date: 09/08/2015
 * Time: 15:13
 */

namespace TeachMe\Providers;

use Collective\Html\HtmlServiceProvider as CollectiveHtmlServiceProvider;
use TeachMe\Component\HtmlBuilder;

class HtmlServiceProvider extends CollectiveHtmlServiceProvider
{
    /**
     * Register the HTML builder instance.
     *
     * @return void
     */
    protected function registerHtmlBuilder()
    {
        $this->app->bindShared('html', function($app)
        {
            return new HtmlBuilder($app['config'], $app['view'], $app['url']);
        });
    }
}