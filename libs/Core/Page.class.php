<?php

abstract class Page extends Base
{
    /**
     * @var bool
     */
    public $needAuth = true;

    /**
     * Page constructor.
     */
    public function init()
    {
        if ($this->checkAuth()) {
            header("Location: /login");
        }
    }

    /**
     * @return bool
     */
    protected function checkAuth()
    {
        if ($this->needAuth === true && empty($this->user['id'])) {
            return true;
        }

        return false;
    }

    /**
     * @param mixed[] $data
     * @return mixed
     */
    public abstract function update($data);

    /**
     * @return void
     */
    public abstract function show();
}