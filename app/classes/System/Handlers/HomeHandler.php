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
    //private $db;
    private $api;
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
        $this->api = new API("https://api.github.com");
        $this->detect = new \Mobile_Detect();
    }

    protected function info(): void
    {
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier - info',
            'styles' => $this->detect->isMobile() ? $styles = __FUNCTION__ . 'MobileStyles' : $styles = __FUNCTION__ . 'Styles',
        ]);
    }

    protected function home(): void
    {
        if (isset($_POST['join'])) {
            $this->session->set('code', $_POST['join']);
            $this->session->set('username', $_POST['username']);
        }

        // Redirect to info if there is no code
        $code = $_GET['code'];
        if (!(isset($code)/* ? Lobby::lobbyExists($code) : false*/)) {
            header("Location: /info");
        }

        // Close cURL
        $this->api->close();
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier - join',
            'styles' => $this->detect->isMobile() ? $styles = __FUNCTION__ . 'MobileStyles' : $styles = __FUNCTION__ . 'Styles',
            'code' => $code
        ]);
    }
}