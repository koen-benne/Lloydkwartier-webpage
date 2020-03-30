<?php

namespace System\Handlers;

use System\Databases\Database;
use System\Form\Data;
use System\Form\Validation\LoginValidator;
use System\Form\Validation\SigninValidator;
use System\APIs\API;

class HomeHandler extends BaseHandler
{
    /**
     * @var Database
     */
    private $db;
    private $api;

    /**
     * ReservationHandler constructor.
     * @param $templateName
     * @throws \ReflectionException
     * @throws \Exception
     */
    public function __construct($templateName)
    {
        parent::__construct($templateName);
        //$this->db = (new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME))->getConnection();
        $this->api = new API("https://api.github.com");
    }

    protected function home(): void
    {
        // Do stuff

        $this->api->close();
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier',
        ]);
    }

}