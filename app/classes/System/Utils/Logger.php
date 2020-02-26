<?php


namespace System\Utils;

/**
 * Class Logger
 * @package System\Utils
 */
class Logger
{
    private $errorLog = LOG_PATH . 'error.log';
    private $file;
    public function __construct()
    {
        $this->file = fopen($this->errorLog, 'a');
    }
    /**
     * @param \Exception $e
     */
    public function error(\Exception $e): void
    {
        $date = date('d-m-Y H:i');
        $message = "[{$date}] {$e->getMessage()} on line {$e->getLine()} of {$e->getFile()}" . PHP_EOL;
        fwrite($this->file, $message);
    }
    public function __destruct()
    {
        fclose($this->file);
    }
}