<?php

namespace App\Core;

/**
 * Class Controller
 * @package App\Core
 */
class Controller
{
    public function json(array $data) {
        return json_encode($data);
    }
}
