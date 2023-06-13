<?php

namespace App\Controller\Iplan;

use App\Entity\IplanActualite;
use App\Entity\Iplanfooter;
use App\Entity\Iplanheader;
use App\Entity\IplanImage;
use App\Entity\Iplanlogo;
use App\Entity\IplanMenus;
use App\Entity\Iplanpage;
use App\Entity\IplanSection;
use App\Entity\IplanSousmenus;
use EasyCorp\Bundle\EasyAdminBundle\Config\Crud;
use EasyCorp\Bundle\EasyAdminBundle\Config\Dashboard;
use EasyCorp\Bundle\EasyAdminBundle\Config\MenuItem;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractDashboardController;
use EasyCorp\Bundle\EasyAdminBundle\Router\AdminUrlGenerator;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\Routing\Annotation\Route;

class IplanController extends AbstractDashboardController
{
    public function __construct(
        private AdminUrlGenerator $adminUrlGenerator
    )
    {
        
    }
    #[Route('/admin1', name: 'admin1')]
    public function index(): Response
    {
        $routeBuilder = $this->container->get(AdminUrlGenerator::class);
        $url = $routeBuilder->setController(IplanheaderCrudController::class)->generateUrl();
 
       return $this->redirect($url);
    }

    public function configureDashboard(): Dashboard
    {
        return Dashboard::new()
            ->setTitle('IPLAN SA');
    }

    public function configureMenuItems(): iterable
    {
        yield MenuItem::linkToDashboard('Dashboard', 'fa fa-home');
        yield MenuItem::linkToRoute('retour vers le site', 'fas fa-undo ','app_iplan');
        yield MenuItem::linkToRoute('retour vers l interface de control ', 'fas fa-undo ','app_controle');
        
        Yield MenuItem::subMenu('Le header ','fas fa-header')->setSubItems([
         
            MenuItem::linkToCrud('Liste des headers','fas fa-list', Iplanheader::class),
            MenuItem::linkToCrud('Ajouter un header','fas fa-plus', Iplanheader::class)->setAction(Crud::PAGE_NEW),
   
         ]);

        Yield MenuItem::subMenu('Les pages ','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des Pages','fas fa-list', Iplanpage::class),
            MenuItem::linkToCrud('Ajouter une Page','fas fa-plus', Iplanpage::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les menus ','fas fa-link')->setSubItems([
         
            MenuItem::linkToCrud('Liste des menus','fas fa-list', IplanMenus::class),
            MenuItem::linkToCrud('Ajouter un menu','fas fa-plus', IplanMenus::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les sous menus ','fas fa-link')->setSubItems([
         
            MenuItem::linkToCrud('Liste des sous menus','fas fa-list', IplanSousmenus::class),
            MenuItem::linkToCrud('Ajouter un sous menu','fas fa-plus', IplanSousmenus::class)->setAction(Crud::PAGE_NEW),
   
         ]);
         Yield MenuItem::subMenu('Les Sections ','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des sections','fas fa-list', IplanSection::class),
            MenuItem::linkToCrud('Ajouter une section','fas fa-plus', IplanSection::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les Actualités ','fas fa-newspaper')->setSubItems([
         
            MenuItem::linkToCrud('Liste des actualites','fas fa-list', IplanActualite::class),
            MenuItem::linkToCrud('Ajouter une actualité','fas fa-plus', IplanActualite::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Le Footer ','fas fa-paw')->setSubItems([
         
            MenuItem::linkToCrud('Liste des footer','fas fa-list', Iplanfooter::class),
            MenuItem::linkToCrud('Ajouter un footer','fas fa-plus', Iplanfooter::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Le Logo ','fas fa-building')->setSubItems([
         
            MenuItem::linkToCrud('Liste des logo','fas fa-list', Iplanlogo::class),
            MenuItem::linkToCrud('Ajouter un logo','fas fa-plus', Iplanlogo::class)->setAction(Crud::PAGE_NEW),
   
         ]);

         Yield MenuItem::subMenu('Les Images ','fas fa-photo-video')->setSubItems([
         
            MenuItem::linkToCrud('Liste des images','fas fa-list', IplanImage::class),
            MenuItem::linkToCrud('Ajouter une image','fas fa-plus', IplanImage::class)->setAction(Crud::PAGE_NEW),
   
         ]);

       
    }
}
