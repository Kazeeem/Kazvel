<?php

namespace Core;

use Dotenv\Dotenv;

class Env
{
    protected $env;

    protected function getProjectEnv()
    {
        if (!$this->env) {
            $dotenv = $this->createImmutableEnv();
            $this->env = $dotenv->load();
        }
    }

    /**
     * @return Dotenv
     */
    protected function createImmutableEnv()
    {
        return Dotenv::createUnsafeImmutable(dirname(__DIR__));
    }

    /**
     * @param $key
     * @param null $default
     * @return array|false|mixed|string|null
     */
    public function getEnv($key, $default = null)
    {
        $this->getProjectEnv();

        $value = getenv($key) ?? $default;

        switch (strtolower($value)) {
            case 'true':
            case '(true)':
                return true;
            case 'false':
            case '(false)':
                return false;
            case 'empty':
            case '(empty)':
                return '';
            case 'null':
            case '(null)':
                return;
        }

        return $value;
    }
}