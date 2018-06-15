<?php

namespace App\Controller;

use App\Core\Controller;
use App\Service\GarageService;

/**
 * Class AppController
 * @package App\Controller
 */
class AppController extends Controller
{
    public function index()
    {
        try {
            return $this->json((new GarageService())->garageTest());
        } catch (\Exception $e) {
            return $this->json(['error' => $e->getMessage(), 'trace' => $e->getTrace()]);
        }
    }
}