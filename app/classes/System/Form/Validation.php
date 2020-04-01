<?php

namespace System\Form;

use System\APIs\API;

/**
 * Interface Validation
 * @package System\Form\Validation
 */
abstract class Validation
{
    /**
     * Validate the data
     * @param API $api
     * @param string $code
     * @param string $name
     * @return array|null
     */
    public static function signIn(API $api, string $code, string $name) :?array
    {
        if (strlen($name) > 10) {
            $errors[] = 'Gebruikersnaam is te lang. Het mag niet langer zijn dan 10 karakters';
        }

        return $errors ?? null;
    }
}