<?php

namespace System\Handlers;

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
    }

    protected function home(): void
    {

        // Cool info stuff

        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier',
            'styles' => $this->detect->isMobile() ? __FUNCTION__ . 'MobileStyles' : __FUNCTION__ . 'Styles',
            'script' => __FUNCTION__ . 'Script',
        ]);
    }
}