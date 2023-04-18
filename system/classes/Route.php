<?php

class Route
{
    protected $dirPath;

    public function __construct($dirPath = '')
    {
        $this->dirPath = $dirPath;
    }

    public function get($path, $callback = null)
    {
        $callback();
    }
}
