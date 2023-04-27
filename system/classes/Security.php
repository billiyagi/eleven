<?php

use voku\helper\AntiXSS;
use Rakit\Validation\Validator;

class Security
{
    public function xss()
    {
        return new AntiXSS();
    }

    public function validation()
    {
        return new Validator([
            'required' => 'Data diperlukan, isi terlebih dahulu.',
            'email' => 'Alamat Email tidak valid',
        ]);
    }
}
