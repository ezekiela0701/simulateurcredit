<?php

namespace App\Controller\Front;

use App\Form\SimulatorType;
use App\Service\Traitement;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

    /**
    * @Route("/", name="front.")
    */
class IndexController extends AbstractController
{
    /**
     * @Route("/", name="index")
     */
    public function index(Traitement $traitement , Request $request): Response
    {
        
        $form = $this->createForm(SimulatorType::class) ;

        $form->handleRequest($request) ;

        if ($form->isSubmitted() && $form->isValid()) {
            # code...
            $datas = $form->getData() ;

            $simulate = $traitement->TraitementSimulator($datas) ; 
            
        }

        return $this->render('Front/index/index.html.twig', [

            'controller_name' => 'IndexController',
            'form_client'     => $form->createView() ,
            'simulates'       => isset($simulate)&& $simulate != null ? $simulate : null ,
            'datas'           => isset($datas)&& $datas != null ? $datas : null ,
            
        ]);

    }
}
