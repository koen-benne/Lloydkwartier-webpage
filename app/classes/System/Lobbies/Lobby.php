<?php


namespace System\Lobbies;


use System\APIs\API;
use System\Utils\StringUtils;

class Lobby implements LobbyInterface
{
    private $code, $isReady;
    private $player1, $player2;

    /**
     * Lobby constructor.
     * @param string $code
     */
    public function __construct(string $code)
    {
        $this->code = $code;
    }

    /**
     * @param string $code
     * @return bool
     */
    public static function isAvailable(string $code) :bool
    {
        // Get if lobby exists
        return true;
    }

    /**
     * @param API $api
     * @return Lobby
     * @throws \Exception
     */
    public static function generateLobby(API $api): Lobby
    {
        $code = null;
        while ($code === null || $api->call("GET", "lobby/", ['lobbyCode' => $code]) === null) {
            $code = StringUtils::genRandString();
        }
        var_dump($code);

        var_dump($api->call("POST", 'lobby/', ['lobbyCode' => $code]));

        return new Lobby($api->call("GET", 'createLobby'));
    }

    /**
     * @param API $api
     * @param string $code
     * @throws \Exception
     */
    public static function closeLobby(API $api, string $code)
    {
        $api->call("POST", "/lobbies/close", ['lobbyCode' => $code]);
    }

    /**
     * @param API $api
     * @throws \Exception
     */
    public function close(API $api)
    {
        $api->call("GET", ['closeLobby' => $this->code]);
    }

    /**
     * @param API $api
     */
    public static function join(API $api)
    {

    }

    /**
     * @param API $api
     */
    public function leave(API $api)
    {

    }

    /**
     * @param API $api
     * @return bool
     */
    public function isReady(API $api): bool
    {
        return $this->isReady;
    }


}