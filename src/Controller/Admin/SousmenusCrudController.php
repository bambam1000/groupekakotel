<?php

namespace App\Controller\Admin;

use App\Entity\Sousmenus;
use EasyCorp\Bundle\EasyAdminBundle\Controller\AbstractCrudController;
use EasyCorp\Bundle\EasyAdminBundle\Field\SlugField;
use EasyCorp\Bundle\EasyAdminBundle\Field\TextField;

class SousmenusCrudController extends AbstractCrudController
{
    public static function getEntityFqcn(): string
    {
        return Sousmenus::class;
    }

    
    public function configureFields(string $pageName): iterable
    {
        yield TextField::new('nom_fr');
         yield TextField::new('nom_ang');
         yield SlugField::new('slug')
          ->setTargetFieldName('nom_fr');
          yield TextField::new('link');
      
    }
    
}
