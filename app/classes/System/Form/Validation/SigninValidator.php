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
     * @param User $username
     * @param string $email
     * @param string $password
     */
    public function __construct(string $username, string $email, string $password)
    {
        $this->username = $username;
        $this->email = $email;
        $this->password = $password;
    }

    /**
     * Validate the data
     */
    public function validate(\PDO $db): void
    {
        $emailArray = explode("@", $this->email);
        if (count($emailArray) !== 2 || count(explode(".", $emailArray[1])) !== 2) {
            $this->errors[] = "De email is ongeldig.";
        }

        try {
            User::getUser($db, $this->email);
            $this->errors[] = "Deze email is al in gebruik";
        } catch (\Exception $e) {

        }

        if (empty($this->username)) {
            $this->errors[] = "Username veld is leeg";
        }

        if (strlen($this->username) > 50) {
            $this->errors[] = "Username is te lang";
        }

        if (empty($this->password)) {
            $this->errors[] = "Password veld is leeg";
        }

    }

    /**
     * @return array
     */
    public function getErrors(): array
    {
        return $this->errors;
    }
}