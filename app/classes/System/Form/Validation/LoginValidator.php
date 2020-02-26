<?php


namespace System\Form\Validation;

use System\User\User;

class LoginValidator implements Validator
{
    private $errors = [];
    private $user, $password;

    /**
     * LoginValidator constructor.
     *
     * @param User $user
     * @param string $password
     */
    public function __construct(User $user, string $password)
    {
        $this->user = $user;
        $this->password = $password;
    }

    /**
     * Validate the data
     */
    public function validate(\PDO $db): void
    {
        if (!empty($this->user->email)) {
            //Validate password
            if (!password_verify($this->password, $this->user->password)) {
                $this->errors[] = "Je login gegevens zijn onjuist.";
            }
        } else {
            $this->errors[] = "Je login gegevens zijn onjuist.";
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