<?php

namespace App\Controller\Admin;

use App\Form\SimulatorType;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

/**
* @Route("/admin/action", name="admin.action")
*/
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(): Response
    {


        return $this->render('Admin/index/index.html.twig', [
            'controller_name' => 'IndexController',
        ]);
    }
}
