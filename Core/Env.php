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

        return getenv($key) ?? $default;
    }
}