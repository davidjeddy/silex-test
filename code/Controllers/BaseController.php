<?php
namespace SilexTest\Controllers;

use Symfony\Component\HttpFoundation\Response;

class BaseController{

    public function index(\Silex\Application $app)
    {
        return new Response(\json_encode([
            'message' => 'CNTL Service works.'
        ]));
    }
}