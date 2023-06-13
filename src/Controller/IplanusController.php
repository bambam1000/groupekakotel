<?php

namespace App\Controller;

use App\Repository\IplansuFooterRepository;
use App\Repository\IplansuHeaderRepository;
use App\Repository\IplansuPageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IplanusController extends AbstractController
{
   
        
   
    #[Route('/iplanus', name: 'app_iplanus')]
    public function index(
        IplansuPageRepository $page,
        IplansuHeaderRepository $header,
        IplansuFooterRepository $footer

    ): Response
    {
        return $this->render('iplanus/index.html.twig', [
            'home'=>$page->findBy(['nom'=>'home']),
            'header'=>$header->findBy(['nom'=>'header']),
            'footer'=>$footer->findBy(['nom'=>'footer']),
        ]);
    }
}
