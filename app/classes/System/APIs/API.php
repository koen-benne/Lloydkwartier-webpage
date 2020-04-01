<?php


namespace System\APIs;


class API
{
    /**
     * @var string
     */
    private $url;
    /**
     * @var string
     */
    private $username;
    /**
     * @var string
     */
    private $password;
    /**
     * @var false|resource
     */
    private $curl;

    /**
     * API constructor.
     * @param string $url
     * @param string $username
     * @param string $password
     */
    public function __construct(string $url, string $username = "", string $password = "")
    {
        $this->url = $url;
        $this->username = $username;
        $this->password = $password;

        $this->curl = curl_init();
    }

    /**
     * Post example: call("POST", "/lobby/", ['lobbyCode' => '19919'])
     *
     * @param $method
     * @param $path
     * @param bool $data
     * @return bool|string
     * @throws \Exception
     */
    public function call($method, $path, $data = false)
    {

        $url = $this->url . $path;

        switch ($method)
        {
            case "POST":
                curl_setopt($this->curl, CURLOPT_POST, 1);

                if ($data)
                    curl_setopt($this->curl, CURLOPT_POSTFIELDS, http_build_query($data));
                break;
            case "PUT":
                curl_setopt($this->curl, CURLOPT_PUT, 1);
                break;
            default:
                if ($data)
                    $url = sprintf("%s?%s", $url, http_build_query($data));
        }
        var_dump($url);

        // Optional Authentication:
        if ($this->username !== "" || $this->password !== "") {
            curl_setopt($this->curl, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
            curl_setopt($this->curl, CURLOPT_USERPWD, $this->username . ":" . $this->password);
        }
        curl_setopt($this->curl, CURLOPT_IPRESOLVE, CURL_IPRESOLVE_V4 );
        curl_setopt($this->curl, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
        curl_setopt($this->curl, CURLOPT_URL, $url);
        curl_setopt($this->curl, CURLOPT_RETURNTRANSFER, 1);

        $result = curl_exec($this->curl);
        $error = curl_error($this->curl);
        if ($error) {
            throw new \Exception($error);
        }
        curl_reset($this->curl);

        return $result;
    }

    /**
     * Always use this function when there is no use for the cURL handler anymore
     */
    public function close()
    {
        curl_close($this->curl);
    }

}