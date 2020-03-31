<?php


namespace System\Lobbies;


use System\Utils\API;

interface LobbyInterface
{

    public function __construct(string $code);

    public static function generateLobby(API $api) :Lobby;

    public static function isAvailable(string $code) :bool;

    public static function closeLobby(API $api, string $code);

    public function close(API $api);

    public static function join(API $api);

    public function leave(API $api);

    public function isReady(API $api) :bool;

}