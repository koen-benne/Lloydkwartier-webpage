<?php


namespace System\Lobbies;


use System\Utils\API;

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

    public static function lobbyExists(string $code) :bool
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
        return Lobby($api->call("GET", 'createLobby'));
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