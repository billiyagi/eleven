<?php

class Request
{
    public function onSubmit($submit, $callback)
    {

        if (isset($_POST[$submit])) {
            return $callback($param = '');
        }
    }
}
