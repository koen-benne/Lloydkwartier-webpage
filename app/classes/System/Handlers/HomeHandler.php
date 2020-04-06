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
     * @var \Mobile_Detect
     */
    private $detect;

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
        $this->detect = new \Mobile_Detect();
        $this->api = new API("https://lloydkwartierapi.herokuapp.com/", "admin", "@ikbenadmin123");
    }

    protected function home(): void
    {
        $lobby = Lobby::generateLobby($this->api);


        // Cool info stuff

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier',
            'style' => $this->detect->isMobile() ? __FUNCTION__ . 'MobileStyles' : __FUNCTION__ . 'Styles',
            'script' => __FUNCTION__ . 'Script',
        ]);
    }
}