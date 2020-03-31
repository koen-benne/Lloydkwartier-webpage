<?php


namespace System\Handlers;


use System\APIs\API;
use System\Databases\Database;
use System\Form\Validation;

class GameHandler extends BaseHandler
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

    protected function notFound(): void
    {
        $message = "The lobby that you are looking for does not exist or is full";
        if (isset($_GET['issue'])) {
            if ($_GET['issue'] == 2) {
                $message = "This lobby can no longer be accessed";
            }
        }

        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier - Lobby not found',
            'styles' => $this->detect->isMobile() ? $styles = __FUNCTION__ . 'MobileStyles' : $styles = __FUNCTION__ . 'Styles',
            'message' => $message,
        ]);
    }

    protected function play(): void
    {
        $lobby = null;
        if ($this->session->keyExists('lobby')) {
            $lobby = $this->session->get('lobby');
            if ($lobby == null) header("Location: /notfound?issue=2");
        } else {
            header("Location: /notfound?issue=1");
        }

        // Close cURL
        $this->api->close();
        //Return formatted data
        $this->renderTemplate([
            'pageTitle' => 'Lloydkwartier - play',
            'styles' => $this->detect->isMobile() ? $styles = __FUNCTION__ . 'MobileStyles' : $styles = __FUNCTION__ . 'Styles',
        ]);
    }

    protected function join(): void
    {
        if (isset($_POST['join'])) {
            $errors = Validation::signIn($this->api, $_POST['join'], $_POST['username']);
            if ($errors == null) {
                //$this->session->set('lobby', Lobby->join($_POST['join'], $_POST['username']));
                header("Location: /play");
            }
        }

        // Redirect to info if there is no code
        $code = $_GET['code'] ?? null;
        if (isset($code) ? Lobby::isAvailable($code) : false) {
            header("Location: /notfound");
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