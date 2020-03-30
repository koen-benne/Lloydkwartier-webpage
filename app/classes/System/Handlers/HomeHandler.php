<?php

namespace System\Handlers;

use System\Databases\Database;
use System\Form\Data;
use System\Form\Validation\LoginValidator;
use System\Form\Validation\SigninValidator;
use System\APIs\API;
use System\Lobbies\Lobby;

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

    protected function info(): void
    {
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier - info',
        ]);
    }

    protected function home(): void
    {
        // Redirect to info if there is no code
        $code = $_GET['code'];
        if (!isset($code) || !Lobby::lobbyExists($code)) {
            header("Location: /info");
        }

        $this->api->close();
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier - join',
        ]);
    }
}