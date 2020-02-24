<?php

namespace System\Handlers;

use System\Utils\Logger;
use System\Utils\Session;
/**
 * Class BaseHandler
 * @package System\Handlers
 *
 * Dynamic properties to enable auto complete:
 * @property Session $session
 * @property Logger $logger
 */
abstract class BaseHandler
{
    /**
     * @var string
     */
    protected $templatePath;
    /**
     * @var array
     */
    protected $properties = [];
    /**
     * @var array
     */
    private $data = [];
    /**
     * @var array
     */
    protected $errors = [];
    /**
     * BaseHandler constructor.
     *
     * @param $templateName
     * @throws \ReflectionException
     */
    public function __construct($templateName)
    {
        $className = (new \ReflectionClass($this))->getShortName();
        $this->templatePath = str_replace('handler', '', strtolower($className)) . '/' . $templateName;
    }
    /**
     * @param $name
     * @param $value
     */
    public function __set($name, $value)
    {
        $this->properties[$name] = $value;
    }
    /**
     * @param $name
     * @return mixed
     */
    public function __get($name)
    {
        return $this->properties[$name];
    }
    /**
     * @param $name
     * @param $arguments
     * @return mixed
     * @throws \Exception
     */
    public function __call($name, $arguments): \System\Handlers\BaseHandler
    {
        if (method_exists($this, $name)) {
            call_user_func_array([$this, $name], $arguments);
        } else {
            throw new \Exception("Route does not exist");
        }
        return $this;
    }
    /**
     * Use output buffers to capture template data from require statement and store in data
     *
     * @param array $vars
     * @throws \RuntimeException
     */
    protected function renderTemplate(array $vars): void
    {
        if (array_key_exists('content', $vars)) {
            throw new \RuntimeException('Key "content" is forbidden as template variable');
        }
        extract($vars);
        ob_start();
        require_once INCLUDES_PATH . 'templates/' . $this->templatePath . '.php';
        $this->data['content'] = ob_get_clean();
        $this->data = array_merge($this->data, $vars);
    }
    /**
     * Return the rendered master template HTML
     *
     * @return string
     */
    public function getHTML(): string
    {
        extract($this->data);
        ob_start();
        require_once INCLUDES_PATH . 'templates/master.php';
        return ob_get_clean();
    }
}