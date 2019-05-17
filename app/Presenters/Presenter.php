<?php

namespace App\Presenters;

class Presenter
{
    /**
     * Dynamically retrieve attributes on the presenter.
     *
     * @param  string  $key
     * @return mixed
     */
    public function __get($key)
    {
        if (method_exists($this, $key)) {
            return $this->$key();
        }

        return $this->$key;
    }
}
