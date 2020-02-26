<?php

namespace System\Handlers;

use System\Handlers\BaseHandler;

class NotFoundHandler extends BaseHandler
{
    protected function index(): void
    {
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => "404 - Pagina niet gevonden"
        ]);
    }
}