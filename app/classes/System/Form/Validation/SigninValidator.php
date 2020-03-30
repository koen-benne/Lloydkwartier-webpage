<?php


namespace System\Form\Validation;

use http\Exception;
use System\User\User;

class SigninValidator implements Validator
{
    private $errors = [];
    private $username, $email, $password;

    /**
     * LoginValidator constructor.
     *
     * @param string $username
     * @param string $code
     */
    public function __construct(string $username, string $code)
    {
        $this->username = $username;
        $this->email = $code;
    }

    /**
     * Validate the data
     * @param \PDO $db
     */
    public function validate(\PDO $db): void
    {



    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}