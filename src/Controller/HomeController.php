<?php

namespace App\Controller;

use App\Entity\Header;
use App\Repository\FooterRepository;
use App\Repository\HeaderRepository;
use App\Repository\PagesRepository;
use App\Repository\SectionRepository;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class HomeController extends AbstractController
{
    #[Route('/', name: 'app_home')]
    public function index(
        HeaderRepository $header,
        FooterRepository $footer,
        PagesRepository $page,
        SectionRepository $section
            ): Response
    {
        return $this->render('home/index.html.twig', [
            'header'=>$header->findBy(["nom"=>"header"]),
            'footer'=>$footer->findBy(["nom"=>"footer"]),
            'home'=>$page->findBy(["nom"=>"home"]),
            
            
        ]);
    }

    #[Route('/contact', name: 'app_contact')]
    public function contact(
        HeaderRepository $header,
        FooterRepository $footer,
        PagesRepository $page,
        SectionRepository $section
    ): Response
    {
        return $this->render('home/contact.html.twig', [
            'header'=>$header->findBy(["nom"=>"header"]),
            'footer'=>$footer->findBy(["nom"=>"footer"]),
            'contact'=>$page->findBy(["nom"=>"contact"]),
            
        ]);
    }
}
