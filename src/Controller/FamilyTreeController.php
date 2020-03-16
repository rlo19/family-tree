<?php

namespace App\Controller;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\Routing\Annotation\Route;

class FamilyTreeController extends BaseController
{
    /**
     * @Route("/", name="homepage")
     */
    public function index(Request $request)
    {
        return $this->render('index.html.twig', [
            // 'number' => $number,
        ]);
    }
}
