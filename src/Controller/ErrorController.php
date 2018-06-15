<?php

namespace App\Controller;

use App\Core\Controller;

class ErrorController extends Controller
{
    public function error404(\Throwable $e)
    {
        return $this->json(['error' => $e->getMessage()]);
    }

    public function error500(\Throwable $e)
    {
        return $this->json(['error' => $e->getMessage(), 'trace' => $e->getTrace()]);
    }
}