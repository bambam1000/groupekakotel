<?php

namespace App\Controller\Admin;

use App\Entity\Actualite;
use App\Entity\Categories;
use App\Entity\Footer;
use App\Entity\Header;
use App\Entity\Logo;
use App\Entity\Menus;
use App\Entity\Pages;
use App\Entity\Section;
use App\Entity\Sousmenus;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class DashboardController extends AbstractDashboardController
{  
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
        
    }

    #[Route('/admin', name: 'admin')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(HeaderCrudController::class)->generateUrl();
 
       return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle(' Accueil Kakotel');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('retour vers le site', 'fas fa-undo ','app_home');
        yield MenuItem::linkToRoute('retour vers l interface de control ', 'fas fa-undo ','app_controle');

        Yield MenuItem::subMenu('Le header ','fas fa-header')->setSubItems([
         
            MenuItem::linkToCrud('Liste des headers','fas fa-list', Header::class),
            MenuItem::linkToCrud('Ajouter un header','fas fa-plus', Header::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les pages ','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des pages','fas fa-list', Pages::class),
            MenuItem::linkToCrud('Ajouter une page','fas fa-plus', Pages::class)->setAction(Crud::PAGE_NEW),
   
         ]);

       


         Yield MenuItem::subMenu('Les Menus','fas fa-link')->setSubItems([
         
            MenuItem::linkToCrud('Liste des Menus','fas fa-list', Menus::class),
            MenuItem::linkToCrud('Ajouter un Menu','fas fa-plus', Menus::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         
         Yield MenuItem::subMenu('Les Sousmenus','fas fa-link')->setSubItems([
         
            MenuItem::linkToCrud('Liste des Sousmenus','fas fa-list', Sousmenus::class),
            MenuItem::linkToCrud('Ajouter une Sousmenu','fas fa-plus', Sousmenus::class)->setAction(Crud::PAGE_NEW),
   
         ]);
         
         Yield MenuItem::subMenu('Les Sections','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des Sections','fas fa-list', Section::class),
            MenuItem::linkToCrud('Ajouter une Section','fas fa-plus', Section::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les Actualités','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des Actualités','fas fa-list', Actualite::class),
            MenuItem::linkToCrud('Ajouter une actualité','fas fa-plus', Actualite::class)->setAction(Crud::PAGE_NEW),
   
         ]);


         Yield MenuItem::subMenu('Le footer','fas fa-paw')->setSubItems([
         
            MenuItem::linkToCrud('Liste des Footer','fas fa-list', Footer::class),
            MenuItem::linkToCrud('Ajouter un footer','fas fa-plus', Footer::class)->setAction(Crud::PAGE_NEW),
   
         ]);
         Yield MenuItem::subMenu('Le Logo','fas fa-building')->setSubItems([
         
            MenuItem::linkToCrud('Liste des Logo','fas fa-list', Logo::class),
            MenuItem::linkToCrud('Ajouter un Logo','fas fa-plus', Logo::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         
         
}
}