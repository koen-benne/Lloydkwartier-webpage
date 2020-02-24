<?php

namespace System\Form\Validation;

/**
 * Interface Validator
 * @package System\Form\Validation
 */
interface Validator
{
    /**
     * Validate magic
     * @param \PDO $db
     */
    public function validate(\PDO $db): void;

    /**
     * @return array
     */
    public function getErrors(): array;
}