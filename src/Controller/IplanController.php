<?php

namespace App\Controller;

use App\Repository\IplanfooterRepository;
use App\Repository\IplanheaderRepository;
use App\Repository\IplanpageRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IplanController extends AbstractController
{
    #[Route('/iplan', name: 'app_iplan')]
    public function index(
        IplanpageRepository $page,
        IplanheaderRepository $header,
        IplanfooterRepository $footer
    ): Response
    {
        return $this->render('iplan/index.html.twig', [
            'home'=>$page->findBy(["nom"=>"home"]),
            'header'=>$header->findBy(["nom"=>"header"]),
            'footer'=>$footer->findBy(["nom"=>"footer"])

        ]);
    }

   

    #[Route('/iplanabout', name: 'iplanabout')]
    public function about(
        IplanpageRepository $page,
        IplanheaderRepository $header,
        IplanfooterRepository $footer
    ): Response
    {
        return $this->render('iplan/about.html.twig', [
            'about'=>$page->findBy(["nom"=>"Apropos"]),
            'header'=>$header->findBy(["nom"=>"header"]),
            'footer'=>$footer->findBy(["nom"=>"footer"])
        ]);
    }



    #[Route('/iplannossolutions', name: 'app_iplannossolutions')]
    public function slotion(
        IplanpageRepository $page,
        IplanheaderRepository $header,
        IplanfooterRepository $footer
    ): Response
    {
        return $this->render('iplan/solution.html.twig', [
            'solutions'=>$page->findBy(["nom"=>"Nos_solutions"]),
            'header'=>$header->findBy(["nom"=>"header"]),
            'footer'=>$footer->findBy(["nom"=>"footer"])
        ]);
    }



    #[Route('/iplancontact', name: 'app_iplancontact')]
    public function contact(
        IplanpageRepository $page,
        IplanheaderRepository $header,
        IplanfooterRepository $footer
    ): Response
    {
        return $this->render('iplan/contact.html.twig', [
            'contact'=>$page->findBy(["nom"=>"Contact"]),
            'header'=>$header->findBy(["nom"=>"header"]),
            'footer'=>$footer->findBy(["nom"=>"footer"])
        ]);
    }


    #[Route('/iplannews', name: 'app_iplannews')]
    public function news(
        IplanpageRepository $page,
        IplanheaderRepository $header,
        IplanfooterRepository $footer
    ): Response
    {
        return $this->render('iplan/news.html.twig', [
            'news'=>$page->findBy(["nom"=>"new"]),
            'header'=>$header->findBy(["nom"=>"header"]),
            'footer'=>$footer->findBy(["nom"=>"footer"])
        ]);
    }
}
