<?php


namespace System\Lobbies;


use System\Utils\API;

interface LobbyInterface
{

    /**
     *
     * @param API $api
     * @return Lobby
     *
     * This will generate a lobby
     */
    public static function generateLobby(API $api): Lobby;

    public function close(API $api);

    public static function join(API $api);

    public function leave(API $api);

    public function isReady(API $api): bool;

}