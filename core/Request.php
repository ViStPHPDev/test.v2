<?php

namespace App\Core;

/**
 * Class Request
 * @package App\Core
 */
class Request
{
    private $get = [];
    private $post = [];
    private $cookie = [];
    private $files = [];
    private $server = [];

    /**
     * Request constructor.
     */
    public function __construct()
    {
        $this->get = $this->clean($_GET);
        $this->post = $this->clean($_POST);
        $this->request = $this->clean($_REQUEST);
        $this->cookie = $this->clean($_COOKIE);
        $this->files = $this->clean($_FILES);
        $this->server = $this->clean($_SERVER);
    }

    /**
     * @param $data
     * @return array|string
     */
    public function clean($data)
    {
        if (is_array($data)) {
            foreach ($data as $key => $value) {
                unset($data[$key]);
                $data[$this->clean($key)] = $this->clean($value);
            }
        } else {
            $data = htmlspecialchars($data, ENT_COMPAT, 'UTF-8');
        }
        return $data;
    }

    /**
     * @param null $key
     * @return array|mixed|null|string
     */
    public function get($key = null)
    {
        if ($key != null) {
            return isset($this->get[$key]) ? $this->get[$key] : null;
        }
        return $this->get;
    }

    /**
     * @param null $key
     * @return array|mixed|null|string
     */
    public function post($key = null)
    {
        if ($key != null) {
            return isset($this->post[$key]) ? $this->post[$key] : null;
        }
        return $this->post;
    }

    /**
     * @param null $key
     * @return array|mixed|null|string
     */
    public function request($key = null)
    {
        if ($key != null) {
            return isset($this->request[$key]) ? $this->request[$key] : null;
        }
        return $this->request;
    }

    /**
     * @param null $key
     * @return array|mixed|null|string
     */
    public function cookie($key = null)
    {
        if ($key != null) {
            return isset($this->cookie[$key]) ? $this->cookie[$key] : null;
        }
        return $this->cookie;
    }

    /**
     * @param null $key
     * @return array|mixed|null|string
     */
    public function files($key = null)
    {
        if ($key != null) {
            return isset($this->files[$key]) ? $this->files[$key] : null;
        }
        return $this->files;
    }

    /**
     * @param null $key
     * @return array|mixed|null|string
     */
    public function server($key = null)
    {
        if ($key != null) {
            return isset($this->server[$key]) ? $this->server[$key] : null;
        }
        return $this->server;
    }
}