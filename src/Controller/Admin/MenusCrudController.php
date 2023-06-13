<?php

namespace App\Controller\Admin;

use App\Entity\Menus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\AssociationField;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;
use EasyCorp\Bundle\EasyAdminBundle\Field\UrlField;

class MenusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Menus::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
         yield TextField::new('nom_fr');
         yield TextField::new('nom_ang');
         yield SlugField::new('slug')
          ->setTargetFieldName('nom_fr');
          yield TextField::new('link');
        yield AssociationField::new('sousmenus');  

          
    }
    
}
