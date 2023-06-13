<?php

namespace App\Controller\IplanSu;

use App\Entity\IplansuActualite;
use App\Entity\IplansuFooter;
use App\Entity\IplansuHeader;
use App\Entity\IplansuImage;
use App\Entity\IplansuLogo;
use App\Entity\IplansuMenus;
use App\Entity\IplansuPage;
use App\Entity\IplansuSection;
use App\Entity\IplansuSousmenus;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Context\AdminContext;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IplanSuController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
        
    }
    #[Route('/iplansu', name: 'admin3')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(IplansuHeaderCrudController::class)->generateUrl();
 
       return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('Iplan America');
            
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('retour vers le site', 'fas fa-undo ','app_iplanus');
        yield MenuItem::linkToRoute('retour vers l interface de control ', 'fas fa-undo ','app_controle');


        
        Yield MenuItem::subMenu('Le header ','fas fa-header')->setSubItems([
         
            MenuItem::linkToCrud('Liste des headers','fas fa-list', IplansuHeader::class),
            MenuItem::linkToCrud('Ajouter un header','fas fa-plus', IplansuHeader::class)->setAction(Crud::PAGE_NEW),
   
         ]);

        Yield MenuItem::subMenu('Les pages ','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des Pages','fas fa-list', IplansuPage::class),
            MenuItem::linkToCrud('Ajouter une Page','fas fa-plus', IplansuPage::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les menus ','fas fa-link')->setSubItems([
         
            MenuItem::linkToCrud('Liste des menus','fas fa-list', IplansuMenus::class),
            MenuItem::linkToCrud('Ajouter un menu','fas fa-plus', IplansuMenus::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les sous menus ','fas fa-link')->setSubItems([
         
            MenuItem::linkToCrud('Liste des sous menus','fas fa-list', IplansuSousmenus::class),
            MenuItem::linkToCrud('Ajouter un sous menu','fas fa-plus', IplansuSousmenus::class)->setAction(Crud::PAGE_NEW),
   
         ]);
         Yield MenuItem::subMenu('Les Sections ','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des sections','fas fa-list', IplansuSection::class),
            MenuItem::linkToCrud('Ajouter une section','fas fa-plus', IplansuSection::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les Actualités ','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des actualites','fas fa-list', IplansuActualite::class),
            MenuItem::linkToCrud('Ajouter une actualité','fas fa-plus', IplansuActualite::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Le Footer ','fas fa-paw')->setSubItems([
         
            MenuItem::linkToCrud('Liste des footer','fas fa-list', IplansuFooter::class),
            MenuItem::linkToCrud('Ajouter un footer','fas fa-plus', IplansuFooter::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Le Logo ','fas fa-building')->setSubItems([
         
            MenuItem::linkToCrud('Liste des logo','fas fa-list', IplansuLogo::class),
            MenuItem::linkToCrud('Ajouter un logo','fas fa-plus', IplansuLogo::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les Images ','fas fa-photo-video')->setSubItems([
         
            MenuItem::linkToCrud('Liste des images','fas fa-list', IplansuImage::class),
            MenuItem::linkToCrud('Ajouter une image','fas fa-plus', IplansuImage::class)->setAction(Crud::PAGE_NEW),
   
         ]);
    }
}
